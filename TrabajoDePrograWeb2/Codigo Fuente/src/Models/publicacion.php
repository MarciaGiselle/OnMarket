<?php


class Publicacion extends Model
{
    private $idPublicacion;
    private $titulo;
    private $duracion;
    private $fecha;
    private $id_user;
    private $id_Producto;


    public function insertarPublicacion(){
        $array=[
         "fecha"=> $this->getFecha(),
         "titulo"=>$this->getTitulo(),
         "id_user"=>$this->getId_user(),
            "id_Producto"=>$this->getId_Producto()

        ];

        $this->setIdPublicacion($this->insert($array));
        return $this->getIdPublicacion();
    }

    public function modificarPublicacion(){
        $array=[
            "fecha"=> $this->getFecha(),
            "titulo"=>$this->getTitulo(),
            "id_user"=>$this->getId_user(),
            "id_Producto"=>$this->getId_Producto(),
             // "pk"=>$this->getIdPublicacion()
        ];

        $this->setIdPublicacion($this->update($array));
        return $this->getIdPublicacion();
    }


    public function  traePublicaionesPorIdUser($idUser){

          $resultado=$this->pageRows(1,100, "id_user=$idUser");

          return $resultado;


  }



    public function  traePublicaionPorId($idUser){

        $resultado=$this->pageRows(0,1, "id=$idUser");

        return $resultado;


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
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * @param mixed $duracion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getId_Producto()
    {
        return $this->id_Producto;
    }

    /**
     * @param mixed $id_producto
     */
    public function setId_Producto($id_producto)
    {
        $this->id_Producto = $id_producto;
    }
   
   

}