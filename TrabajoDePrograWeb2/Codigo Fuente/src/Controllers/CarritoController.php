<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 11:41
 */

class CarritoController extends Controller
{
    function verCarrito()
    {
        $d["title"] = "Mi carrito";
        $this->set($d);
        if (!isset($_SESSION["carrito"])) {
          echo "No ha cargado ningún producto al carrito";
        } else {
            $this->render(Constantes::CARRITOVIEW);
        }
    }


}