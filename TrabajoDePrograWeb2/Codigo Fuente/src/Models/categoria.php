<?php


class Categoria extends Model
{
    private $idCategoria;
    private $nombreCategoria;


    function obtenerIdCategoria($nombreCat){
    $res=$this->pageRows(0,1, "nombreCategoria='$nombreCat'");
     if(!empty($res[0])){
         $respuesta=$res[0];
         $id=$respuesta["idCategoria"];
         return $id;
     }else{
         return false;
     }
    }


    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @param mixed $idCategoria
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    /**
     * @return mixed
     */
    public function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }

    /**
     * @param mixed $nombreCategoria
     */
    public function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;
    }








}