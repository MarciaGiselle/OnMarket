<?php


class FormaEntrega extends Model
{
    private $idEntrega;
    private $descripcion;

    /**
     * @return mixed
     */
    public function getIdEntrega()
    {
        return $this->idEntrega;
    }

    /**
     * @param mixed $idEntrega
     */
    public function setIdEntrega($idEntrega)
    {
        $this->idEntrega = $idEntrega;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

   

   
}