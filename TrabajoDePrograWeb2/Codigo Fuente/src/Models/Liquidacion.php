<?php


class liquidacion extends Model
{
    private $id;
    private $fecha_liquidacion;
    private $total;
    private $ganancia;

    function crearLiquidacion(){
        $array= [
            "fecha_liquidacion" => $this->getFechaLiquidacion(),
            "total" => $this->getTotal(),
            "ganancia" => $this->getGanancia()
        ];
        $this->setId($this->insert($array));
        return $this->getId();
    }

    function consultarEstadoDeLiquidacion($mes,$year){
        //consulta a la base del estado por mes y year
    }

    function consultarLiquidacion(){
        //consulta la liquidacion creada para actualizarlo en la vista
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFechaLiquidacion()
    {
        return $this->fecha_liquidacion;
    }

    /**
     * @param mixed $fecha_liquidacion
     */
    public function setFechaLiquidacion($fecha_liquidacion)
    {
        $this->fecha_liquidacion = $fecha_liquidacion;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getGanancia()
    {
        return $this->ganancia;
    }

    /**
     * @param mixed $ganancia
     */
    public function setGanancia($ganancia)
    {
        $this->ganancia = $ganancia;
    }


}