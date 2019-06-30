<?php


class PerfilesDeUsuariosController extends  Controller
{
   function usuarios(){
       $d["title"] = "Perfiles";

       $usuario=new Usuario();
       $usuariosEncontrados=$usuario->traerTodosLosUsuarios();
       echo count($usuariosEncontrados);
       $idUsuarios=[];
       for($i=0; $i<count($usuariosEncontrados) ;$i++) {
           $id = $usuariosEncontrados[$i]["id"];
           $id_admin=$_SESSION["logueado"];



               array_push($idUsuarios, $id);

       }
       $d["usuarios"] = $usuariosEncontrados ;
       $this->set($d);
       $this->render(Constantes::PERFILESVIEW);
   }
}