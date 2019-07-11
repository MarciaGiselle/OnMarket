<?php


class Publicacion_Entrega extends Model
{
    private $idPublicacion;
    private $idEntrega;

    public function insertarEntrega(){
        $array=[
            "idPublicacion"=> $this->getIdPublicacion(),
            "idEntrega"=>$this->getIdEntrega(),


        ];

        $this->setIdEntrega($this->insert($array));
        return $this->getIdEntrega();
    }

    function traerEntrgaPorPublicacion($pk){
        $resultado=$this->pageRows(0,2, "idPublicacion=$pk");

        return $resultado;
    }
function eliminar(){
      $this->Eliminartablaintermedia( $this->getIdPublicacion());
       
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








}

