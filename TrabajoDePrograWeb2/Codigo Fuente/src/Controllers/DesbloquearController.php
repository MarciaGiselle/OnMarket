<?php


class DesbloquearController extends Controller
{
    function desbloquear($datos){
        $d["title"] = "desbloquear";
        $id_user=$datos["id_user"];
        $user=new Usuario;

        $usuario=$user->traerUserPorPk($id_user);

        $d["usuario"] = $usuario;


        $this->set($d);

        $this->render(Constantes::DESBLOQUEARWIEW);
    }

    function confirmarDesbloqueo($datos){
        $id_user=$datos["id_user"];
        $usuario =new Usuario();
        $usuario->desbloquearUsuario($id_user);

        header("Location:" .getBaseAddress().'PerfilesDeUsuarios/usuarios');
    }

}