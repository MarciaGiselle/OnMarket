<?php


class mes extends Model
{
    private $id;
    private $nombre;

    function getAllMeses(){
        $resultado= $this->pageRows(0,PHP_INT_MAX);
        return $resultado;
    }
    function getMesById($id){
        $resultado = $this->pageRows(0,1, "id = $id");
        return $resultado[0]["nombre"];
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }



}
