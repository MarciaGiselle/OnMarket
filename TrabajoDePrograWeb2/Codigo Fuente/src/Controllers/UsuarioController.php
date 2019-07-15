<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 11:41
 */

class UsuarioController extends Controller
{

    function login($usuario)
    {
        header("Content-type: application/json");
        $data = json_decode(utf8_decode($usuario['data']));

        $nombre = $data->nombre;
        $pass = $data->password;

        $passSHA = sha1($pass);
        $usuario = new Usuario ();
        $usuario->setName($nombre);
        $usuario->setPassword($passSHA);

        if ($usuario->validarFormatosLogin()) {
            $idUsuario = $usuario->buscarUsuario();
            $usuario->setId($idUsuario);
            $_SESSION["idUser"] = $idUsuario;


            if (!empty($idUsuario)) {
                $_SESSION["logueado"] = $idUsuario["id"];
                $_SESSION["name"] = $idUsuario["name"];

                $user = new Usuario();

                $estado = $user->consultarEstadoDelUsuario($_SESSION["logueado"]);

                if ($estado == 1) {
                    $rol = $user->buscarRolDelUsuario($_SESSION["logueado"]);
                    if ($rol == 1) {
                        $_SESSION["admin"] = true;
                    }
                } else {
                    throw new NombreOPassInvalidoException("su usuario esta bloqueado ", CodigoError::NombreOPassInvalidoException);
                }

            } else {

                throw new NombreOPassInvalidoException("Nombre o password incorrectos", CodigoError::NombreOPassInvalidoException);
            }

            echo json_encode($rol);
        }
    }

    function cerrarSesion()
    {
        session_destroy();
        unset($_SESSION["carrito"]);
        unset ($_SESSION["logueado"]);
        unset ($_SESSION["name"]);
        $d["title"] = "Index";
        $this->set($d);
        header("Location:" . getBaseAddress());
    }


    function mostrarInicio()
    {
        $d["title"] = "Index";
        $d["nombreUsuario"] = $_SESSION["name"];
        $this->set($d);
        $this->render(Constantes::USUARIOVIEW);

    }


    function realizarCompra($datos)
    {
        header("Content-type: application/json");
        $data = json_decode(utf8_decode($datos['data']));
        $total = $data->total;
        $codigo = $data->codigoDeSeguridad;
        $fecha = $data->fechaDeVencimiento;
        $numeroTarjeta = $data->numeroTarjeta;
        $direccion = $data->direccion;
        $email = $data->email;

        $idUser = $_SESSION["logueado"];

        if (isset($idUser)) {
            $tarjeta = new tarjeta_de_credito();
            $producto = new Producto();
            $publicacion = new Publicacion();
            $usuario = new Usuario();
            $cuenta = new Cuenta();


            $tarjeta->setIdUser($idUser);
            $tarjeta->setCodSeguridad($codigo);
            $tarjeta->setNumero($numeroTarjeta);
            $tarjeta->setFechaVencimiento($fecha);
            $idTarjeta = $tarjeta->insertar();
            $fecha_actual = date("y-m-d");

            if (isset($idTarjeta)) {
                $cobranza = new cobranza();

                //    for para recorrer el array de ids e insertarlos
                $tope = count($_SESSION["carrito"]);

                for ($i = 0; $i < $tope; $i++) {
                    //parte para las estadisticas
                    $prod = new Producto();
                    $productoCompra = $prod->buscarUnProductoPorPk($_SESSION["carrito"][$i]["id"]);
                    //metodo de estadisticas
                    $this->realizarEstadisticas($productoCompra);

                    //realizar compra
                    $cobranza->setIdTarjeta($idTarjeta);
                    $cobranza->setFecha($fecha_actual);
                    $cobranza->setTotal($total);
                    $cobranza->setIdComprador($_SESSION["logueado"]);
                    $cobranza->setIdProducto($_SESSION["carrito"][$i]["id"]);
                    $cobranza->setCantidad($_SESSION["carrito"][$i]["cantidad"]);
                    //estadistica de montos
                    $this->estadisticasMontos($total);

                    //vendedor
                    $prodEncontrado = $producto->buscarUnProductoPorPk($cobranza->getIdProducto());
                    $publicEncontrada = $publicacion->traerPublicaciondelProducto($prodEncontrado["id"]);
                    $vendedor = $usuario->traerUserPorPk($publicEncontrada["id_user"]);

                    $cuentaVendedor = $cuenta->consultarCuenta($vendedor["id"]);
                    $cuenta->setId($cuentaVendedor["id"]);
                    $cobranza->setIdVendedor($vendedor["id"]);

                    $precio = $cobranza->getCantidad() * $prodEncontrado["precio"];
                    $cobranza->setIdCuenta($cuentaVendedor["id"]);
                    $cuenta->realizarDeposito($cuentaVendedor, $precio);

                    $idCobranza = $cobranza->insertarCobranza();
                    $this->enviarMails($_SESSION["carrito"], $direccion, $email);

                }

                if (isset($idCobranza)) {
                    unset($_SESSION["carrito"]);
                }
            }


        } else {
            throw new ExcentionRegistar("Compra fallida", CodigoError::ExcentionRegistar);
        }

        echo json_encode(true);


    }

    function estadisticasMontos($total)
    {
        $rango = new Rango_montos();
        $rangos = $rango->traerTodas();

        foreach ($rangos as $rango) {
            if ($total >= $rango["desde"] && $total < $rango["hasta"]) {
                if (empty($rango["id_estadistica"])) {
                    $rangoNuevo = new Rango_montos();
                    $estadistica = new Estadisticas();
                    $estadistica->setCantidad(1);
                    $estadistica->setIdTipo(3);
                    $idEstadistica = $estadistica->insertarEstadistica();

                    $rangoNuevo->setId($rango["id"]);
                    $rangoNuevo->setIdEstadistica($idEstadistica);
                    $rangoNuevo->insertarEstadisticasAlMonto();
                } else {
                    // se agrega a la estadistica
                    $estadistic = new Estadisticas();

                    $estadisticaDelMonto = $estadistic->traerEstadistica($rango["id_estadistica"], 3);
                    $estadistic->setId($estadisticaDelMonto["id"]);
                    $cantidad = $estadisticaDelMonto["cantidad"] + 1;

                    $estadistic->setCantidad($cantidad);
                    $estadistic->actualizarEstadistica();
                }

            }
        }

    }

    function realizarEstadisticas($productoCompra)
    {
        $categoria = new Categoria();
        $categoriaProd = $categoria->traerCategoriaPorPk($productoCompra["idCategoria"]);

        if (empty($categoriaProd["id_estadistica"])) {

            $estadistica = new Estadisticas();
            $estadistica->setCantidad(1);
            $estadistica->setIdTipo(2);
            $idEstadistica = $estadistica->insertarEstadistica();

            $categoria->setIdCategoria($categoriaProd["id"]);
            $categoria->setIdEstadistica($idEstadistica);
            $categoria->insertarEstadisticasAlaCategoria();

        } else {
            // se agrega a la estadistica
            $estadistic = new Estadisticas();

            $estadisticaDelProd = $estadistic->traerEstadistica($categoriaProd["id_estadistica"], 2);


            $estadistic->setId($estadisticaDelProd["id"]);
            $cantidad = $estadisticaDelProd["cantidad"] + 1;

            $estadistic->setCantidad($cantidad);
            $estadistic->actualizarEstadistica();


        }
    }

    function enviarMails($carrito, $direccion, $email)
    {
        $publicacion = new Publicacion();
        $producto = new Producto();
        $entrega = new publicacion_Entrega();

        for ($i = 0; $i < count($carrito); $i++) {
            $public = $publicacion->traerPublicaciondelProducto($carrito[$i]["id"]);
            $prod = $producto->buscarUnProductoPorPk($carrito[$i]["id"]);
            $entr = $entrega->traerEntrgaPorPublicacion($public["id"]);
            $cont = $this->contarMetodos($entr);
            if ($cont == "correo") {
                //Correo
                $asunto = "Vendiste " . $prod['nombre'] . " ";
                $mensaje = "Buen Trabajo! Tu comprador eligió recibir el producto por correo.
            Usa servicios con seguro, envíalo a nombre del comprador y guarda copias de los recibos de envío.
            Que sigan los éxitos, 
            El equipo de OnMarket";
            } elseif ($cont == "acordar") {
                //acordar
                $asunto = "Vendiste " . $prod['nombre'] . " ";
                $mensaje = "Buen Trabajo! Tu comprador eligió acordar el envío directamente contigo.Encuéntrate en un lugar concurrido para hacer el intercambio.
                Si vas a enviar el producto, usa servicios con seguro, envíalo a nombre del comprador y guarda copias de los recibos de envío.
                Que sigan los éxitos,
                El equipo de OnMarket";

            } else {
                //da igual
                $asunto = "Vendiste " . $prod['nombre'] . " ";
                $mensaje = "Buen Trabajo! Coordina con tu comprador para saber como desea recibir el producto.
            Que sigan los éxitos, 
            El equipo de OnMarket";
            }
            $this->enviarMensajeAlVendedor($asunto, $mensaje, $public);
        }

    }

    function contarMetodos($entrega)
    {
        if (count($entrega) > 1) {
            //tiene dos metodos
            return 2;
        } elseif ($entrega[0]["idEntrega"] == 1) {
            //es solo a acordar
            return "acordar";
        } elseif ($entrega[0]["idEntrega"] == 2) {
            //es correo
            return "correo";
        }
    }

    function enviarMensajeAlVendedor($asunto, $mensaje, $publicacion)
    {
        $user = new Usuario();
        $idVendedor = $publicacion["id_user"];
        $vendedor = $user->traerUserPorPk($idVendedor);

        $emailVendedor = $vendedor["email"];
        $usuario = $user->traerUserPorPk($_SESSION["logueado"]);

        $headers = "MIME-Version: 1.0";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        // dirección del remitente
        $headers .= "From: " . $usuario['name'] . "   " . $usuario['lastname'] . "\r\n";
        //seria el mail del vendedor pongo el mio para comprobar q ande ,ademas los emial son de mentira los de los vendedores*/
        mail("rocio.centurion367@gmail.com", $asunto, $mensaje, $headers);
    }

    function valorar($datos)
    {

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($datos['data']));

        $vendedor = new Usuario();
        $publicacion = new Publicacion();
        $tipoValoracion = new tipo_valoracion();
        $valoracion = new valoracion();

        $idProducto = $data->idValorado;
        $estrellas = $data->estrellas;
        $comentario = $data->comentario;

        $publicEncontrada = $publicacion->traerPublicaciondelProducto($idProducto);
        $idVendedor = $vendedor->traerUserPorPk($publicEncontrada["id_user"]);


        $valoracion->setIdVendedor($idVendedor["id"]);
        $valoracion->setIdLogueado($_SESSION["logueado"]);
        $valoracion->setIdProducto($idProducto);


        $error = 0;
        if (FuncionesComunes::validarNumeros($estrellas)) {
            $valoracion->setNumero($estrellas);
        } else {
            $error .= 1;
        }
        if (isset($comentario)) {
            if (FuncionesComunes::validarCadenaNumerosYEspacios($comentario)) {
                $valoracion->setComentario($comentario);
            } else {
                $error .= 1;

            }
        }
        if ($error == 0) {
            $valoracion->insertarValoracion();
            $promedio = $valoracion->realizarPromedioPorPk($idVendedor["id"]);
            $idValoracion = $tipoValoracion->definirIdPorPromedio($promedio);
            $vendedor->setId($idVendedor["id"]);
            $vendedor->setIdTipo($idValoracion);
            $vendedor->actualizarTipo();


        }

        echo json_encode(true);
    }

}
 





   

