<?php


class liquidacion extends Model
{
    private $id;
    private $fecha_liquidacion;
    private $total;
    private $ganancia;
    private $idYear;
    private $idMes;
    private $idAdmin;


    function crearLiquidacion()
    {
        $array = [
            "fecha_liquidacion" => $this->getFechaLiquidacion(),
            "total" => $this->getTotal(),
            "ganancia" => $this->getGanancia(),
            "idYear" => $this->getIdYear(),
            "idMes" => $this->getIdMes(),
            "idAdmin" =>$this->getIdAdmin()
        ];
        $this->setId($this->insert($array));
        return $this->getId();
    }

    function consultarEstadoDeLiquidacion($mes, $year)
    {
        //consulta a la base del estado por mes y year
        $resultado = $this->pageRows(0, 1, "idMes=$mes AND idYear=$year");
        if (empty($resultado)) {
            return 1;
        } else {
            return 2;
        }

    }


    function calcularGanancia($facturacion)
    {
        //logica de porcentajes y bla
        $porcentajeComision = 0.04;
        $m = $facturacion * $porcentajeComision;
        return (round(($m) * 100) / 100);
    }

    function consultarTodas()
    {
        $resultado = $this->pageRows(0, PHP_INT_MAX);
        return $resultado;
    }

    /**
     * @return mixed
     */
    public function getIdYear()
    {
        return $this->idYear;
    }

    /**
     * @param mixed $idYear
     */
    public function setIdYear($idYear)
    {
        $this->idYear = $idYear;
    }

    /**
     * @return mixed
     */
    public function getIdMes()
    {
        return $this->idMes;
    }

    /**
     * @param mixed $idMes
     */
    public function setIdMes($idMes)
    {
        $this->idMes = $idMes;
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

    /**
     * @return mixed
     */
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
     * @param mixed $idAdmin
     */
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;
    }


}