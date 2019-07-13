<?php


class Rango_montos extends Model
{
private $id;
private $desde;
private $hasta;
private $cantidad;

function traerTodas(){
    $resultado=$this->pageRows(0,10);

    return $resultado;
}
    function traerRangoPorPk($pk){
        $resultado=$this->pageRows(0,1,"id=$pk");

        return $resultado[0];
    }
function actualizar(){
    $array=[
        "id"=> $this->getId(),
        "cantidad"=>$this->getCantidad(),
    ] ;
    $this->update($array);
    return $this->getId();

}



    /**
     * @return Database
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param Database $db
     */
    public function setDb($db)
    {
        $this->db = $db;
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
    public function getDesde()
    {
        return $this->desde;
    }

    /**
     * @param mixed $desde
     */
    public function setDesde($desde)
    {
        $this->desde = $desde;
    }

    /**
     * @return mixed
     */
    public function getHasta()
    {
        return $this->hasta;
    }

    /**
     * @param mixed $hasta
     */
    public function setHasta($hasta)
    {
        $this->hasta = $hasta;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }



}