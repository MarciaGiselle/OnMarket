<?php


class BloquearController extends Controller
{

    function bloquear($datos){
        $d["title"] = "Bloquear";
        $id_user=$datos["id_user"];
        $user=new Usuario;

        $usuario=$user->traerUserPorPk($id_user);

        $d["usuario"] = $usuario;


        $this->set($d);

        $this->render(Constantes::BLOQUEARWIEW);
    }

    function confirmarBloqueo($datos){
        $id_user=$datos["id_user"];
         $usuario =new Usuario();
         $usuario->bloquearUsuario($id_user);

    echo "el usuario esta bloqueado";

    }



}