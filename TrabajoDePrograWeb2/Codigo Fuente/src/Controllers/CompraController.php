<?php


class CompraController EXTENDS Controller
{
    function IngresarTarjeta($datos){
        $d["title"] = "ingresar tarjeta";
        $total=$datos["total"];
        $d["total"] = $total;
        $this->set($d);
        $this->render(Constantes::COMPRAVIEW);
    }
}