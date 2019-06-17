<?php


class TarjetaController EXTENDS Controller
{
    function tarjeta($datos){
        $d["title"] = "Busqueda";
        $total=$datos["total"];
        $d["total"] = $total;
        $this->set($d);
        echo $total;
        $this->render(Constantes::TARJETAVIEW);
    }
}