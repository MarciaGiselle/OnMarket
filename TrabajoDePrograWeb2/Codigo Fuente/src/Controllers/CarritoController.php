<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 11:41
 */

class CarritoController extends Controller
{
    function carrito()
    {
        $d["title"] = "Index";
        $this->set($d);


        $this->render(Constantes::CARRITOVIEW);
    }



}