<?php


class Publicacion_Entrega extends Model
{
    private $idPublicacion;
    private $idEntrega;
    private $id;

    public function insertarEntrega(){
        $array=[
            "idPublicacion"=>$this->getIdPublicacion() ,
            "idEntrega"=>$this->getIdEntrega(),


        ];

        $this->setIdEntrega($this->insert($array));
        return $this->getIdEntrega();
    }

    function traerEntrgaPorPublicacion($pk){
        $resultado=$this->pageRows(0,2, "idPublicacion=$pk");

        return $resultado;
    }
    public function eliminarEntrega($pk){


        $this->delete($pk);


    }

    public function actualizarEntrega(){
        $array=[
            "id"=> $this->getId(),
            "idPublicacion"=> $this->getIdPublicacion(),
            "idEntrega"=>$this->getIdEntrega(),


        ];

        $this->update($array);


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
    public function getIdPublicacion()
    {
        return $this->idPublicacion;
    }

    /**
     * @param mixed $idPublicacion
     */
    public function setIdPublicacion($idPublicacion)
    {
        $this->idPublicacion = $idPublicacion;
    }

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






}

