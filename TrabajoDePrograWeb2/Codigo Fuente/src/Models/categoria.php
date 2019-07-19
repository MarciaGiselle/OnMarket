<?php


class Categoria extends Model
{
    private $id;
    private $nombreCategoria;
    private $id_estadistica;

    function insertarEstadisticasAlaCategoria(){
        $array=[
            "id"=> $this->getIdCategoria(),
            "id_estadistica"=>$this->getIdEstadistica(),
        ] ;
        $this->update($array);
  }
    function traerCatPorIdEstadistica($pk){
        $resultado=$this->pageRows(0,1, "id_estadistica= $pk ");

        return $resultado[0];
    }
    function traerTodas(){
        $resultado=$this->pageRows(0,10);

        return $resultado;
    }


    public function traerCategoriaPorPk($p){

        $resultado=$this->pageRows(0,1, "id=$p");
        return $resultado[0];
    }



    function obtenerIdCategoria($nombreCat){
    $res=$this->pageRows(0,1, "nombreCategoria='$nombreCat'");
     if(!empty($res[0])){
         $respuesta=$res[0];
         $id=$respuesta["id"];
         return $id;
     }else{
         return false;
     }
    }

    function obtenerValorDeGategoria($idCtageoria){
        $res=$this->pageRows(0,1, "id='$idCtageoria'");
        if(!empty($res[0])) {
            $respuesta = $res[0];
            $id = $respuesta["nombreCategoria"];
            return $id;
        }
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