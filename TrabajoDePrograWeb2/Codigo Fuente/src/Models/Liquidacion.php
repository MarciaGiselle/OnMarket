<?php


class liquidacion extends Model
{
    private $id;
    private $fecha_liquidacion;
    private $total;
    private $ganancia;

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