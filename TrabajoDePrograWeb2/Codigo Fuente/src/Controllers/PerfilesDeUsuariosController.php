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

   function buscarUsuario($datos){

       $nombreUserAbuscar=$datos["nombre"];

       $usuario=new Usuario();
       $usuariosResultado=$usuario->buscarUsuariosPorUserName($nombreUserAbuscar);
       $d["title"] = "usuarios encontrados";
       $d["usuarios"] = $usuariosResultado ;
       $this->set($d);
       $this->render(Constantes::PERFILESVIEW);




   }
}