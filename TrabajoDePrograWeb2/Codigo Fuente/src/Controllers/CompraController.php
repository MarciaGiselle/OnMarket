<?php


class CompraController EXTENDS Controller
{
    function IngresarTarjeta($datos){
        if(count($_SESSION['carrito'])>0){
        $d["title"] = "ingresar tarjeta";
        $d["nombreUsuario"]= $_SESSION["name"];
        $total=$datos["total"];

        $d["total"] = $total;
        $this->set($d);
        $this->render(Constantes::COMPRAVIEW);
        }else{
            echo "No hay prodcutos en el carrito";
        }
    }
}