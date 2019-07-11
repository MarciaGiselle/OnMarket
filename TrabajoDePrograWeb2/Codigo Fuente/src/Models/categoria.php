<?php


class Categoria extends Model
{
    private $id;
    private $nombreCategoria;
    private $id_estadistica;


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

    function obtenerValorDeGategoria($idCtageoria){
        $res=$this->pageRows(0,1, "IdCategoria='$idCtageoria'");
        if(!empty($res[0])) {
            $respuesta = $res[0];
            $id = $respuesta["nombreCategoria"];
            return $id;
        }
    }


    function insertarEstadisticasAlaCategoria(){
        $array=[
            "id"=> $this->getIdCategoria(),
            "id_estadistica"=>$this->getIdEstadistica(),
        ] ;
        $this->update($array);
        return $this->getIdCategoria();


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
    public function getIdEstadistica()
    {
        return $this->id_estadistica;
    }

    /**
     * @param mixed $id_estadistica
     */
    public function setIdEstadistica($id_estadistica)
    {
        $this->id_estadistica = $id_estadistica;
    }


    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->id;
    }

    /**
     * @param mixed $idCategoria
     */
    public function setIdCategoria($idCategoria)
    {
        $this->id = $idCategoria;
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