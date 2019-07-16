<?php
class IndexController extends Controller
{
    function index()
    {
            $d["title"] = "Index";
            $usuario= new Usuario();
            if(isset($_SESSION["logueado"])){
               $d["nombreUsuario"]= $_SESSION["name"];
            }
            $this->set($d);
            $this->render(Constantes::INDEXVIEW);

    }


    
}