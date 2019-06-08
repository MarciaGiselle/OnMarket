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


    public function validarFormatos($metodo){
        //validacion de formatos
        $error=0;
        $mensaje="";
        if(empty($metodo)){
            $error.=1;
            $mensaje.="Seleccione un metodo de entrega<br>"." ";
        }
        //ver regex espacios
        if(!FuncionesComunes::validarCadena($this->getTitulo())) {
            $error.=1;
            $mensaje.="Titulo Inválida<br>"." ";
        }

        if(empty($this->getId_user())){
            $error.=1;
            $mensaje.="no existe id de producto<br>"." ";
        }

        if(empty($this->getId_Producto())){
            $error.=1;
            $mensaje.="no existe id de producto<br>"." ";
        }


        if($error>0){
            echo "<script> alert('$mensaje') </script>";
        }
        else{
            return true;


        }

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