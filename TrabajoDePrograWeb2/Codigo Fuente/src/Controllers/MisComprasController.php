<?php

class MisComprasController EXTENDS Controller
{
    function mostrarHistorial()
    {
        $d["title"] = "Historial de Compras";
        $miCobranza = new Cobranza ();
        $producto = new Producto();
        $publicacion = new Publicacion();
        $usuario = new Usuario();


        $misCompras = $miCobranza->buscarMisCompras($_SESSION["logueado"]);

        $arrayProductoVendedor=[];

        for ($i=0;$i<count($misCompras);$i++){
            $prodEncontrado = $producto->buscarUnProductoPorPk($misCompras[$i]["idProducto"]);
            $publicEncontrada = $publicacion->traerPublicaciondelProducto($misCompras[$i]["idProducto"]);
            $vendedor= $usuario->traerUserPorPk($publicEncontrada["id_user"]);


                $arrayProducto=[
                    "compra"=>$misCompras[$i],
                    "prod"=>$prodEncontrado,
                    "vendedor"=>$vendedor];

            array_push($arrayProductoVendedor, $arrayProducto);




        }

        $d["misCompras"] = $arrayProductoVendedor;

        $this->set($d);
        $this->render(Constantes::MISCOMPRASVIEW);

    }
}