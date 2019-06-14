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
                $_SESSION["logueado"] = $nombre;
                $d["title"] = "MiCuenta";

            }else{

               throw new NombreOPassInvalidoException("Nombre o password incorrectos",CodigoError::NombreOPassInvalidoException);
            }

        echo json_encode(true);
    }
}

    function cerrarSesion()
    {
        session_destroy();
       $d["title"] = "Index";
       $this->set($d);
        header("Location:" . getBaseAddress());
    }


    function mostrarInicio()
    {
        $d["title"] = "Index";
        $this->set($d);
        $this->render(Constantes::USUARIOVIEW);

    }

    function comprar(){
    if(isset( $_SESSION["logueado"])){
        //hace la funcioon comprar

    }else{
        alert("No puede comprar sin iniciar sesion");
    }

    }





}
 





   

