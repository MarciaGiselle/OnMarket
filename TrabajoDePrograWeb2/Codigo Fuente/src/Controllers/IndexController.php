<?php
class IndexController extends Controller
{
    function index()
    {
            $d["title"] = "Index";
            $usuario= new Usuario();
            if(isset($_SESSION["logueado"])){
                $user = $usuario->traerUserPorPk($_SESSION["logueado"]);
                $d["nombreUsuario"]= $user["name"];
            }
            $this->set($d);
            $this->render(Constantes::INDEXVIEW);

    }


    
}