<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 11:41
 */

class MostrarproductoController extends Controller
{
    function MostrarProducto($datos)
    {
            $d["title"] = "Index";
            $id=$datos["idProducto"];
            var_dump($datos);
            $producto = new Producto();
            $encontrado= $producto->PorPk($id);
            $d["nombre"] = $encontrado[0]["nombre"];
            $d["precio"] = $encontrado[0]["precio"];
            $d["cantidad"] = $encontrado[0]["cantidad"];
            $d["descripcion"] = $encontrado[0]["descripcion"];
            $d["idProducto"] = $encontrado[0]["idProducto"];



            $imagen =new Imagen();
            $d["imagen"] = $imagen->imagenPk($id);;
            $this->set($d);
            $this->render(Constantes::MOSTRARVIEW);
        
    }


}