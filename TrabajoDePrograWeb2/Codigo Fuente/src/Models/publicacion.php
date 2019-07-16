<?php


class Publicacion extends Model
{
    private $id;
    private $titulo;
    private $id_Estado;
    private $fecha;
    private $id_user;
    private $id_Producto;



    public function insertarPublicacion(){
        $array=[
         "fecha"=> $this->getFecha(),
         "titulo"=>$this->getTitulo(),
         "id_user"=>$this->getId_user(),
        "id_Producto"=>$this->getId_Producto(),
            "id_Estado"=>1

        ];

        $this->setId($this->insert($array));

        return $this->getId();
    }

    public function modificarPublicacion(){
        $array=[
            "id"=> $this->getId(),
            "fecha"=> $this->getFecha(),
            "titulo"=>$this->getTitulo(),            
        ];

       
        return $this->update($array);
    }
    function eliminar($pk){
        return  $this->delete($pk);
    }

    public function  traePublicaionesPorIdUser($idUser){

          $resultado=$this->pageRows(0,100, "id_user=$idUser");

          return $resultado;


  }
  //se supone q esta funcion con nombre feo me traer el id del usuario q hizo la publicacion donde esta el producto
public function traerPublicaciondelProducto($idProd){
    $resultado=$this->pageRows(0,1, "id_Producto=$idProd");

    return $resultado[0];

}


    public function  traePublicaionPorId($id){

        $resultado=$this->pageRows(0,1, "id=$id");

        return $resultado;


    }



    function ActivarPublicacion(){
        $array=[
            "id"=> $this->getId(),
            "id_Estado"=> 1,
        ];


        return $this->update($array);
    }
    function InactivarPublicacion(){
        $array=[
            "id"=> $this->getId(),
            "id_Estado"=>2,
        ];


        return $this->update($array);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdEstado()
    {
        return $this->id_Estado;
    }

    /**
     * @param mixed $id_estado
     */
    public function setIdEstado($id_estado)
    {
        $this->id_Estado = $id_estado;
    }

    /**
     * @param mixed $idPublicacion
     */
    public function setId($id)
    {
        $this->id = $id;
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