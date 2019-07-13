<?php


class LiquidacionController extends Controller
{
    function liquidacion(){
        $d["title"] = "Liquidaciones";

        $year = new Year();
        $mes = new Mes();

        $years = $year -> getAllYears();
        $meses = $mes -> getallMeses();

        $d["meses"] = $meses;
        $d["year"] = $years;

        $this->set($d);
        $this->render(Constantes::LIQUIDACIONVIEW);
    }

    function mostrarLiquidaciones(){
        //path q va a regarcgar el escenario exitoso
        $liquidacion = new Liquidacion();
        $liquidaciones= $liquidacion->consultarLiquidacion($_SESSION["id"]);
    }
    function crearLiquidacion($datos){

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($datos['data']));

        $idMes=$data->mes;
        $idYear=$data->year;

        $cobranza = new Cobranza();
        $liquidacion = new Liquidacion();
        $year = new Year();

        $facturacion = 0;
        $fecha_actual = date('Y-m-d H:i:s');

        $yearNumero = $year->consultarYearPorPK($idYear);

        $estado= $liquidacion->consultarEstadoDeLiquidacion($idMes,$idYear);

        $validarFecha = $this->consultarSiEsUnaFechaValida($idMes, $yearNumero);

        if($validarFecha === true){
        if($estado == 1) {
            $c = $cobranza->consultarCobranzasDelMes($idMes, $yearNumero);
            if (count($c) > 0) {

                for ($i = 0; $i < count($c); $i++) {
                    $facturacion += $c[$i]["total"];
                }
                $ganancia = $liquidacion->calcularGanancia($facturacion);

                $liquidacion->setTotal($facturacion);
                $liquidacion->setGanancia($ganancia);
                $liquidacion->setFechaLiquidacion($fecha_actual);
                $liquidacion->setIdMes($idMes);
                $liquidacion->setIdYear($idYear);
                $id = $liquidacion->crearLiquidacion();

            } else {
                throw new liquidacionException("No hay cobranzas en el período seleccionado", CodigoError::nullCobranzasException);
            }
        } else{
            throw new liquidacionException("Este idMes ya fue liquidado", CodigoError::liquidacionExistenteException);
        }
        }
        else{
            throw new liquidacionException("No ha seleccionado un idMes válido", CodigoError::fechaInvalidaException);

        }


        echo json_encode(true);
    }


    function consultarSiEsUnaFechaValida($mes,$year){
        $mes_actual = date('m');
        $year_actual = date('Y');
        if($year < $year_actual){
            return true;
        }elseif ( $year == $year_actual){
            if($mes>$mes_actual){
                return false;
            }
            else{
                return true;
            }
        }
    }


}