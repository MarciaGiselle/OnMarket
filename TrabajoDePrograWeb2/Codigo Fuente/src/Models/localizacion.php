<?php


class localizacion extends Model
{
  private $id;
  private $longitud;
  private $latitud;
  private $id_user;
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
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
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
            "latitud"=>$this->getLatitud(),
            "id_user"=>$this->getIdUser()
        ] ;
        $this->setId($this->insert($array));
        return $this->getId();
    }
 public function traerLocalizacionPorIdUser($id){

     $resultado=$this->pageRows(0,1, "id_user=$id");

     return $resultado;

}

}