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
            echo "entro a login";

            if (!empty($idUsuario)) {
                $_SESSION["logueado"] = $nombre;
                $d["title"] = "MiCuenta";

            }  else {
                throw new EmailOrNickInvalidoException("El Email o Nickname insertado no son válidos",CodigoError::EmailOrNickInvalido);
            }

        echo json_encode(true);
    }
}


    function cerrarSesion()
    {
        session_destroy();
        $d["title"] = "Index";
        $this->set($d);
        $this->render(Constantes::NAVVIEW);
        $this->render(Constantes::INDEXVIEW);
        $this->render(Constantes::FOOTERVIEW);

    }


    function mostrarInicio()
    {
        $d["title"] = "Index";
        $this->set($d);
        $this->render(Constantes::NAVLOGUEADOVIEW);
        $this->render(Constantes::INDEXVIEW);
        $this->render(Constantes::FOOTERVIEW);

    }




}
 





   

