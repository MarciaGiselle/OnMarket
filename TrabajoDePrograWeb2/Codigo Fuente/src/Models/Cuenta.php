<?php


class Cuenta extends Model
{
    private $id;
    private $fecha_deposito;
    private $monto;
    private $comisionAlSistema;
    private $idUsuario;

    function insertarCuenta(){

        $array=[
            "idUsuario"=> $this->getIdUsuario(),
            "monto"=>$this->getMonto(),
        ] ;

        $this->setId($this->insert($array));
        return $this->getId();

    }

    function consultarCuenta($pk){
        $resultado = $this->pageRows(0,1,"idUsuario= $pk");
        return $resultado[0];

    }
    
    function realizarDeposito($cuenta,$montoADepositar){
    $m=$this->setMonto(($cuenta["monto"])+$montoADepositar);
    echo $m;
        $array=[
            "id"=> $this->getId(),
            "monto"=>$this->getMonto(),
        ] ;
        $this->update($array);
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
    public function getFechaDeposito()
    {
        return $this->fecha_deposito;
    }

    /**
     * @param mixed $fecha_deposito
     */
    public function setFechaDeposito($fecha_deposito)
    {
        $this->fecha_deposito = $fecha_deposito;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    /**
     * @return mixed
     */
    public function getComisionAlSistema()
    {
        return $this->comisionAlSistema;
    }

    /**
     * @param mixed $comisionAlSistema
     */
    public function setComisionAlSistema($comisionAlSistema)
    {
        $this->comisionAlSistema = $comisionAlSistema;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }





}