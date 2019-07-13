<?php


class LiquidacionController extends Controller
{

    function mostrarLiquidaciones(){
        //path q va a regarcgar el escenario exitoso
        $liquidacion = new Liquidacion();
        $liquidaciones= $liquidacion->consultarLiquidacion($_SESSION["id"]);
    }
    function crearLiquidacion($datos){

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($datos['data']));

        $mes=$datos->mes;
        $year=$datos->year;

        $cobranza = new Cobranza();
        $liquidacion = new Liquidacion();

        $facturacion = 0;
        $fecha_actual = date("y-m-d");
        $estado= $liquidacion->consultarEstadoDeLiquidacion($mes,$year);

        if($estado){
        $c = $cobranza->consultarCobranzasDelMes($mes);

        if(count($c)>0){

            for($i = 0 ; $i< count($c); $i++){
            $facturacion += $c[$i]["total"];
        }
        $ganancia = $this->calcularGanancia($facturacion);

        $liquidacion->setTotal($facturacion);
        $liquidacion->setGanancia($ganancia);
        $liquidacion->setFechaLiquidacion($fecha_actual);

        $id=$liquidacion->crearLiquidacion();

        }
        }
        echo json_encode($id);
    }

    function calcularGanancia($facturacion){
        //logica de porcentajes y bla
        $gan = 0;
        return $gan;
    }

}