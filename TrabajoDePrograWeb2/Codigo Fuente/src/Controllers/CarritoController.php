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
        $d["title"] = "Index";
        $this->set($d);
        if (!isset($_SESSION["carrito"])) {
          echo "no a cargado ningun producto al carrito";
        } else {

            $this->render(Constantes::CARRITOVIEW);
        }
    }


}