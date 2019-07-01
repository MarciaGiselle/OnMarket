<?php


class localizacion extends Model
{
  private $id;
  private $longitud;
  private $latitud;

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
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * @param mixed $longitud
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }

    /**
     * @return mixed
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * @param mixed $latitud
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    public function insertarLocalizacion(){
        $array=[
            "longitud"=> $this->getLongitud(),
            "latitud"=>$this->getLatitud()
        ] ;
        $this->setId($this->insert($array));
        return $this->getId();
    }
 public function traerLocalizacionPorId($id){
     $resultado=$this->pageRows(0,1, "id=$id");
     //$resultado=$this->selectByPk($pk);
     return $resultado[0];

}

}