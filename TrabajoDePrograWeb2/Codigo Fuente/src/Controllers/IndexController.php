<?php
class IndexController extends Controller
{
    function index()
    {

            $d["title"] = "Index";
            $this->set($d);

            $this->render(Constantes::INDEXVIEW);

    }

/*if(isset($_SESSION["logueado"])){
$d["title"] = "Index";
$this->set($d);
$this->render(Constantes::NAVLOGUEADOVIEW);
$this->render(Constantes::INDEXVIEW);

}else{
    $d["title"] = "Index";
    $this->set($d);
    $this->render(Constantes::NAVNOLOGUEADOVIEW);
    $this->render(Constantes::INDEXVIEW);
}*/

    
}