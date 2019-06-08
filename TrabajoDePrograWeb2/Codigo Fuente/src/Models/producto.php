
<?php


class Producto extends Model
{
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $cantidad;
    private $precio;
    private $idCategoria;

    public function insertarProducto(){
        $array=[
         "nombre"=> $this->getNombre(),
         "descripcion"=>$this->getDescripcion(),
         "cantidad"=>$this->getCantidad(),
         "precio"=>$this->getPrecio(),
         "idCategoria"=>$this->getIdCategoria(),

     ] ;      
       $this->setIdProducto($this->insert($array));
       return $this->getIdProducto();
    }


    function validarFormatos(){
        //validacion de formatos
        $error=0;
        $mensaje="";

        if(empty($this->idCategoria)){
            $error.=1;
            $mensaje.="Seleccione una categoria<br>"." ";
        }
        if(!FuncionesComunes::validarCadena($this->getNombre())) {
            $error.=1;
            $mensaje.="Nombre Inválido<br>"." ";
        }

        //ver regex espacios
        if(!FuncionesComunes::validarCadena($this->getDescripcion())) {
            $error.=1;
            $mensaje.="Descripcion Inválida<br>"." ";
        }

        //validar que los campos sean solo numeros
        if(!FuncionesComunes::validarNumeros($this->getCantidad())) {
            $error.=1;
            $mensaje.="Cantidad Invalida<br>"." ";
        }
        if(!FuncionesComunes::validarNumeros($this->getPrecio())) {
            $error.=1;
            $mensaje.="Precio Inválido<br>"." ";
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @param mixed $idCategoria
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }


    
   } 