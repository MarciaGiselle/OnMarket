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

