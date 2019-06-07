<?php


class Imagen extends Model
{
    private $id;
    private $nombre;
    private $idProducto;


    function insertarImagen(){
        $array=[
            "nombre"=> $this->getNombre(),
           "idProducto"=>$this->getIdProducto(),
        ];
        $this->setId($this->insert($array));
        return $this->getId();
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

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * @param mixed $idProducto
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }
   


    
    
}