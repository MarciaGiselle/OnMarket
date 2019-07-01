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
                $user=new Usuario();

               $estado=$user->consultarEstadoDelUsuario($_SESSION["logueado"]);

               if($estado==1){
                   $rol= $user->buscarRolDelUsuario($_SESSION["logueado"]);
                    if($rol==1){$_SESSION["admin"]=true;}
               }else{
                   throw new NombreOPassInvalidoException("su usuario esta bloqueado ",CodigoError::NombreOPassInvalidoException);
               }

            }else{

               throw new NombreOPassInvalidoException("Nombre o password incorrectos",CodigoError::NombreOPassInvalidoException);
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




    function realizarCompra($datos){
        header("Content-type: application/json");
        $data = json_decode(utf8_decode($datos['data']));

        $total=$data->total;
        $codigo=$data->codigoDeSeguridad;
        $fecha=$data->fechaDeVencimiento;
        $numeroTarjeta=$data->numeroTarjeta;
        $idUser=$_SESSION["logueado"];
        if(isset($idUser)){
            $tarjeta= new tarjeta_de_credito();
            $tarjeta->setIdUser($idUser);
            $tarjeta->setCodSeguridad($codigo);
            $tarjeta->setFechaVencimiento($fecha);
            $idTarjeta=$tarjeta->insertar();
            if(isset($idTarjeta)) {
                $idCobranza=$tarjeta->pagar( $idTarjeta, $fecha,$total);
            }
        }else{
            throw new ExcentionRegistar("Compra fallida", CodigoError::ExcentionRegistar);
        }

        echo json_encode(true);


    }

    function valorarAlvendedor($datos){

        $valoracion= $datos["estrellas"];
        echo $valoracion;


    }
}
 





   

