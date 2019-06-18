<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 11:41
 */

class MostrarProductoController extends Controller
{
    function verProducto($datos)
    {
            $id=$datos["idProducto"];

            $producto = new Producto();
            $prodEncontrado= $producto->buscarUnProductoPorPk($id);

            $d["resultado"] = $prodEncontrado;
            $d["title"]=$prodEncontrado["nombre"];

            $imagen =new Imagen();
            $d["imagen"] = $imagen->imagenPk($id);;
            $this->set($d);
            $this->render(Constantes::MOSTRARVIEW);
        
    }


}