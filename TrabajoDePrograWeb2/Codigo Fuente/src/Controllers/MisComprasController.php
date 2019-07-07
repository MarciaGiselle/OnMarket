<?php

class MisComprasController EXTENDS Controller
{
    function mostrarHistorial(){
            $d["title"] = "Historial de Compras";
            $miCobranza=new Cobranza ();

            $misCompras=$miCobranza->buscarMisCompras($_SESSION["logueado"]);
            $d["misCompras"]=$misCompras;

            $this->set($d);
            $this->render(Constantes::MISCOMPRASVIEW);

    }
}