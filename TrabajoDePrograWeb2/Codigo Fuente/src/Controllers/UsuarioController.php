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

        $idUser = $_SESSION["logueado"];

        if (isset($idUser)) {
            $tarjeta = new tarjeta_de_credito();
            $producto = new Producto();
            $publicacion = new Publicacion();
            $usuario = new Usuario();


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
                    $cobranza->setIdTarjeta($idTarjeta);
                    $cobranza->setFecha($fecha_actual);
                    $cobranza->setTotal($total);
                    $cobranza->setIdComprador($_SESSION["logueado"]);
                    $cobranza->setIdProducto($_SESSION["carrito"][$i]["id"]);
                    $cobranza->setCantidad($_SESSION["carrito"][$i]["cantidad"]);

                    $prodEncontrado = $producto->buscarUnProductoPorPk($cobranza->getIdProducto());
                    $publicEncontrada = $publicacion->traerPublicaciondelProducto($prodEncontrado["id"]);
                    $vendedor= $usuario->traerUserPorPk($publicEncontrada["id_user"]);

                    $cobranza->setIdVendedor($vendedor["id"]);

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
    function valorarVendedor($datos)

    {
        $vendedor = new Usuario();
        $tipoValoracion = new tipo_valoracion();
        $valoracion = new valoracion();

        $idVendedor= $datos["idValorado"];
        $valoracion->setIdVendedor($idVendedor);

        $error = 0;
        if (FuncionesComunes::validarNumeros($datos["estrellas"])) {
            $valoracion->setNumero($datos["estrellas"]);
        } else {
            $error .= 1;
        }
        if (isset($datos["comentario"])) {
            if (FuncionesComunes::validarCadenaNumerosYEspacios($datos["comentario"])) {
                $valoracion->setComentario($datos["comentario"]);
            } else {
                $error .= 1;

            }
        }
        if ($error == 0) {
            $valoracion->insertarValoracion();
            $promedio = $valoracion->realizarPromedioPorPk($idVendedor);
            $idValoracion = $tipoValoracion->definirIdPorPromedio($promedio);
            $vendedor->setId($idVendedor);
            $vendedor->setIdTipo($idValoracion);
            $vendedor->actualizarTipo();



        }
        header("Location:" .getBaseAddress(). "misCompras/mostrarHistorial");
    }

}
 





   

