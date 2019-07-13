<?php


class EstadisticasController extends Controller
{
    function estadisticas()
    {

        $d["title"] = "Estadisticas";

        $estadistica = new Estadisticas();
        $registrosProd = $estadistica->traerEstasdisticasProd();


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
         // $d["arrayCat"] = $arrayCat;
        $d["arrayCantCat"] = $arrayCantCat;

        $rango=new Rango_montos();
        $rangos=$rango->traerTodas();
        $d["arrayMontos"] = $rangos;
        $this->set($d);
        $this->render(Constantes::ESTADISTICASVIEW);

    }







}