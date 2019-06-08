<?php
class IndexController extends Controller
{
    function index()
    {
        $d["title"] = "Index";
        $this->set($d);
        $this->render(Constantes::NAVVIEW);
        $this->render(Constantes::INDEXVIEW);
        $this->render(Constantes::FOOTERVIEW);


    }


    function deMentira(){
        $d["title"] = "DeMentira";
        $this->set($d);
    }

   
}