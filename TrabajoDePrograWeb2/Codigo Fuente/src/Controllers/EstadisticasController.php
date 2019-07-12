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


        $arrayMontos=$this->estadisticasMontos();
        $d["arrayMontos"] = $arrayMontos;
        $this->set($d);
        $this->render(Constantes::ESTADISTICASVIEW);

    }




    function estadisticasMontos(){
        $cobranza=new Cobranza();
        $producto= new Producto();
        $arrayMontos=$cobranza->traerTodosLosMonstosDeLaCobranzas();
        $mon1=0;$mon2=0;$mon3=0;$mon4=0;$mon5=0;$mon6=0;$mon7=0;
        $array=[7];

        foreach($arrayMontos as $monto){
            if($monto>0 && $monto<200){ $mon1++; }
            if($monto>=200 && $monto<600){ $mon2++;}
            if($monto>=600 && $monto<1000){ $mon3++;}
            if($monto>=1000 && $monto<1500){ $mon4++;}
            if($monto>=1500 && $monto<3000){ $mon5++; }
            if($monto>=3000 && $monto<5000){ $mon6++;}
            if($monto>5000){ $mon7++;}

        }
        $array[0]=$mon1;  $array[1]=$mon2;  $array[2]=$mon3; $array[3]=$mon4;
        $array[4]=$mon5;  $array[5]=$mon6; $array[6]=$mon7;

        return $array;



    }



}