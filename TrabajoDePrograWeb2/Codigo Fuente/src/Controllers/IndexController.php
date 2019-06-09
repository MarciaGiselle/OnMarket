<?php
class IndexController extends Controller
{
    function index()
    {
        $d["title"] = "Index";
        $this->set($d);
        $this->render(Constantes::INDEXVIEW);
    }
}