<?php

class MisComprasController EXTENDS Controller
{
    function mostrarHistorial()
    {
        $d["title"] = "Historial de Compras";
        $d["nombreUsuario"]= $_SESSION["name"];
        $miCobranza = new Cobranza ();
        $producto = new Producto();
        $usuario = new Usuario();
        $tarjeta = new tarjeta_de_credito();
        $valoracion= new valoracion();


        $misCompras = $miCobranza->buscarMisCompras($_SESSION["logueado"]);

        $arrayProductoVendedor = [];

        for ($i = 0; $i < count($misCompras); $i++) {

            $prodEncontrado = $producto->buscarUnProductoPorPk($misCompras[$i]["idProducto"]);
            $vendedor = $usuario->traerUserPorPk($misCompras[$i]["idVendedor"]);
            $tarjetaUsada = $tarjeta->traerPorPk($misCompras[$i]["idTarjeta"]);
            $estado = $valoracion->consultarEstadoDeValoracionPorPk($misCompras[$i]["idProducto"],$vendedor["id"]);
            $arrayProducto = [
                "compra" => $misCompras[$i],
                "prod" => $prodEncontrado,
                "tarjeta" => $tarjetaUsada,
                "vendedor" => $vendedor,
                "estado"=> $estado];
            array_push($arrayProductoVendedor, $arrayProducto);
        }

        $d["misCompras"] = $arrayProductoVendedor;

        $this->set($d);
        $this->render(Constantes::MISCOMPRASVIEW);

    }



}