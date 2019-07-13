<?php


class EstadisticasController extends Controller
{
    function estadisticas()
    {

        $d["title"] = "Estadisticas";

        $estadistica = new Estadisticas();
        $registrosProd = $estadistica->traerEstasdisticasProd();

       //parte de producto
        $producto = new Producto();
        $ArrayProd = [];
        $ArrayCant = [];
        $tope=count($registrosProd);
        $faltantes=6-$tope;
        for($i=0;$i<$tope;$i++) {
            $prod = $producto->traerProdPorIdEstadistica($registrosProd[$i]["id"]);

            array_push($ArrayProd, $prod['nombre']);
            array_push($ArrayCant, $registrosProd[$i]["cantidad"]);


        }

        for($x=0;$x<$faltantes;$x++){
            array_push($ArrayProd,"sin producto");
            array_push($ArrayCant, 0);
        }


        $d["arrayProd"] = $ArrayProd;
        $d["arrayCant"] = $ArrayCant;

        //parte de categoria
        $categoria=new Categoria();

        $arrayCantCat = [];

        $arrayDeCat=$categoria->traerTodas();

        foreach ($arrayDeCat as $cat){
            if(!empty($cat["id_estadistica"])){
                $estadisticaDeCat=$estadistica->traerEstadistica($cat["id_estadistica"],2);
                array_push($arrayCantCat, $estadisticaDeCat["cantidad"] );
            }else{
                array_push($arrayCantCat, 0 );
            }
        }
        $d["arrayCantCat"] = $arrayCantCat;

        //parte de montos
        $arrayCantMontos = [];
        $rango=new Rango_montos();
        $rangos=$rango->traerTodas();
        foreach ($rangos as $rango){
            if(!empty($rango["id_estadistica"])){
                $estadisticaDeMontos=$estadistica->traerEstadistica($rango["id_estadistica"],3);
                array_push($arrayCantMontos, $estadisticaDeMontos["cantidad"] );
            }else{
                array_push($arrayCantMontos, 0 );
            }
        }


        $d["arrayMontos"] = $arrayCantMontos;
        $this->set($d);
        $this->render(Constantes::ESTADISTICASVIEW);

    }







}