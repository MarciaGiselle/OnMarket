<?php

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
                $_SESSION["logueado"] = $idUsuario;
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
        $d["title"] = "Index";
        $this->set($d);
        header("Location:" . getBaseAddress());
    }


    function mostrarInicio()
    {
        $d["title"] = "Mi Cuenta";
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
        $direccion=$data->direccion;
        $email=$data->email;

        $idUser = $_SESSION["logueado"];

        if (isset($idUser)) {
            $tarjeta = new tarjeta_de_credito();
            $producto = new Producto();
            $publicacion = new Publicacion();
            $usuario = new Usuario();
            $cuenta = new Cuenta();

            //tarjeta
            $tarjeta->setIdUser($idUser);
            $tarjeta->setCodSeguridad($codigo);
            $tarjeta->setNumero($numeroTarjeta);
            $tarjeta->setFechaVencimiento($fecha);
            $idTarjeta = $tarjeta->insertar();
            $fecha_actual = date("y-m-d");

            if (isset($idTarjeta)) {
                $cobranza = new cobranza();
                $idCuenta =  $cuenta->consultarCuenta($idUser);


                //    for para recorrer el array de ids e insertarlos
                $tope = count($_SESSION["carrito"]);

                for ($i = 0; $i < $tope; $i++) {
                    //parte para las estadisticas
                    $prod=new Producto();
                    $productoCompra=$prod->buscarUnProductoPorPk($_SESSION["carrito"][$i]["id"]);
                    //metodo de estadisticas
                    $this->realizarEstadisticas( $productoCompra);

                    $prodEncontrado = $producto->buscarUnProductoPorPk($cobranza->getIdProducto());
                    $publicEncontrada = $publicacion->traerPublicaciondelProducto($prodEncontrado["id"]);
                    $vendedor= $usuario->traerUserPorPk($publicEncontrada["id_user"]);

                    //realizar compra
                    $cobranza->setIdTarjeta($idTarjeta);
                    $cobranza->setFecha($fecha_actual);
                    $cobranza->setTotal($total);
                    $cobranza->setIdComprador($_SESSION["logueado"]);
                    $cobranza->setIdProducto($_SESSION["carrito"][$i]["id"]);
                    $cobranza->setCantidad($_SESSION["carrito"][$i]["cantidad"]);
                    $cobranza->setIdCuenta($idCuenta);
                    $cobranza->setIdVendedor($vendedor["id"]);

                    $metodo=$_SESSION["carrito"][$i]["metodo"];
                   // if($metododo=1){$this->enviarMensajeAlVendedor("Acordar con el vendedor",$email,$_SESSION["carrito"][$i]["id"]);}
                   // if($metododo=2){$this->enviarMensajeAlVendedor("Envio por correo ",$direccion,$_SESSION["carrito"][$i]["id"]);}


                    $idCobranza = $cobranza->insertarCobranza();
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


    function realizarEstadisticas( $productoCompra){
        $categoria=new Categoria();
        $categoriaProd=$categoria->traerCategoriaPorPk($productoCompra["idCategoria"]);

        if(empty($categoriaProd["id_estadistica"])){

            $estadistica=new Estadisticas();
            $estadistica->setCantidad(1);
            $estadistica->setIdTipo(2);
            $idEstadistica=$estadistica->insertarEstadistica();

            $categoria->setIdCategoria( $categoriaProd["id"]);
            $categoria->setIdEstadistica($idEstadistica);
            $categoria->insertarEstadisticasAlaCategoria();

        }else{
            // se agrega a la estadistica
            $estadistic=new Estadisticas();
            $estadisticaDelProd=$estadistic->traerEstadistica($categoriaProd,2);

            $estadistic->setId($estadisticaDelProd["id"]);
            $cantidad=$estadisticaDelProd["cantidad"]+1;

            $estadistic->setCantidad($cantidad);
            $estadistic->actualizarEstadistica();




        }
    }








 function enviarMensajeAlVendedor($asunto,$mensaje,$idProd){
     $cuerpo = '
        <!DOCTYPE html>
        <html>
        <head>
         <title></title>
        </head>
        <body>
        '.$mensaje.'
        </body>
        </html>';
     $user=new Usuario();
     $publicacion=new Publicacion();
     $publicacionActual=$publicacion->traerPublicaciondelProducto($idProd);
     $idVendedor=$publicacionActual["id_user"];
     $vendedor=$user->traerUserPorPk($idVendedor);
      $emailVendedor=$vendedor["email"];
     $usuario=$user->traerUserPorPk($_SESSION["logueado"]);
     $headers  = "MIME-Version: 1.0\r\n";
     $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
     //dirección del remitente
     $headers .= "From: ".$usuario['name']."   ".$usuario['lastname'].">\r\n";
    //seria el mail del vendedor pongo el mio para comprobar q ande ,ademas los emial son de mentira los de los vendedores
     mail("rocio.centurion367@gmail.com",$asunto,$cuerpo,$headers);



 }
    function valorar($datos){

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($datos['data']));

        $vendedor = new Usuario();
        $publicacion = new Publicacion();
        $tipoValoracion = new tipo_valoracion();
        $valoracion = new valoracion();

        $idProducto= $data->idValorado;
        $estrellas= $data->estrellas;
        $comentario= $data->comentario;

        $publicEncontrada = $publicacion->traerPublicaciondelProducto($idProducto);
        $idVendedor= $vendedor->traerUserPorPk($publicEncontrada["id_user"]);


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
 





   

