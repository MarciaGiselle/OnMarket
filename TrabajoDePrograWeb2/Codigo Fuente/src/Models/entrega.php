<?php


class Entrega extends Model
{
    private $idEntrega;
    private $tipo;

    function obtenerIdMetodoEntrega($nombreCat){
        $res=$this->pageRows(0,1, "tipo='$nombreCat'");
        if(!empty($res[0])){
            $respuesta=$res[0];
            $id=$respuesta["id"];
            return $id;
        }else{
            return false;
        }
    }


    /**
     * @return mixed
     */
    public function getIdEntrega()
    {
        return $this->idEntrega;
    }

    /**
     * @param mixed $idCategoria
     */
    public function setIdEntrega($id)
    {
        $this->idEntrega = $id;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $nombreCategoria
     */
    public function setTipo($nombre)
    {
        $this->tipo = $nombre;
    }








}