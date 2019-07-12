<?php
class IndexController extends Controller
{
    function index()
    {
var_dump($_SESSION);
            $d["title"] = "Index";
            $this->set($d);

            $this->render(Constantes::INDEXVIEW);

    }


    
}