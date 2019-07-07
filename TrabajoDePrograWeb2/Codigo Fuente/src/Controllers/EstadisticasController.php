<?php


class EstadisticasController extends Controller
{
    function estadisticas()
    {

        $d["title"] = "Estadisticas";

        $registrosDeEstadisticas =$this->filtrarDiezProductosMasBuscados();

        if(count( $registrosDeEstadisticas )>=6) {
            $producto = new Producto();
            $ArrayProd = [];
            foreach ($registrosDeEstadisticas as $id_prod) {
                array_push($ArrayProd, $producto->buscarUnProductoPorPk($id_prod["id_Producto"]));
            }

            $ArrayCantidad = [];
            foreach ($registrosDeEstadisticas as $cantidad) {

                array_push($ArrayCantidad, $cantidad["cantidad"]);
            }

            $d["arrayProd"] = $ArrayProd;
            $d["arrayCant"] = $ArrayCantidad;
        }else{

            $d["mensaje"] ="no hay estadisticas que mostrar por el momento";
        }

        $arrayCat=$this->estadisticasDeCategoria();
        $d["arrayCat"] = $arrayCat;

        $arrayMontos=$this->estadisticasMontos();
        $d["arrayMontos"] = $arrayMontos;
        $this->set($d);
        $this->render(Constantes::ESTADISTICASVIEW);

    }
        function filtrarDiezProductosMasBuscados(){
        $e=new Estadisticas();

        return $e->EstadisticasDeProductos("cantidad",8);


}

      function estadisticasDeCategoria(){
        $cobranza=new Cobranza();
       $producto= new Producto();
        $arrayId_Prod=$cobranza->traerTodosLosIdDeProdDeLaCobranzas();
         $cat1=0;$cat2=0;$cat3=0;$cat4=0;$cat5=0;$cat6=0;$cat7=0;$cat8=0;
          $arrayProd=[7];
        foreach($arrayId_Prod as $id){

            array_push($arrayProd,$producto->buscarUnProductoPorPk($id));

        }
          $arrayCat=[];


          foreach($arrayProd as $prod){
              if($prod["idCategoria"]==1){ $cat1++; }
              if($prod["idCategoria"]==2){ $cat2++;}
              if($prod["idCategoria"]==3){ $cat3++;}
              if($prod["idCategoria"]==4){ $cat4++;}
              if($prod["idCategoria"]==5){ $cat5++; }
              if($prod["idCategoria"]==6){ $cat6++;}
              if($prod["idCategoria"]==7){ $cat7++; }
              if($prod["idCategoria"]==8){ $cat8++; }
           }
          $arrayCat[0]=$cat1;  $arrayCat[1]=$cat2;  $arrayCat[2]=$cat3; $arrayCat[3]=$cat4;
          $arrayCat[4]=$cat5;  $arrayCat[5]=$cat6;  $arrayCat[6]=$cat7; $arrayCat[7]=$cat8;

          return $arrayCat;



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