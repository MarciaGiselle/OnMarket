
<?php


class Producto extends Model
{
    private $id;
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
       $this->setId($this->insert($array));
       return $this->getId();
    }

    function modificarProducto(){
        $array=[
            "id"=> $this->getId(),
            "nombre"=> $this->getNombre(),
            "descripcion"=>$this->getDescripcion(),
            "cantidad"=>$this->getCantidad(),
            "precio"=>$this->getPrecio(),
            "idCategoria"=>$this->getIdCategoria(),
        ] ;

        return $this->update($array);
    }

   function eliminar($pk){
       return  $this->delete($pk);
   }

    function validarFormatos(){
        //validacion de formatos
        $error=0;
        $mensaje="";



    }

    function buscarProductoEnLaBase(){
        $resultadoDeLaBusqueda= $this->pageRows(0,100, "nombre like '%$this->nombre%'");
        $idArray=[];
       if(!empty($resultadoDeLaBusqueda[0])){
            for($i=0;$i<count($resultadoDeLaBusqueda);$i++){
                array_push($idArray, $resultadoDeLaBusqueda[$i]["id"]);
             }
        }
        return $idArray;
    }

    function filasPorPk($pk){
        $resultado=$this->pageRows(0,100, "id=$pk");
      //$resultado=$this->selectByPk($pk);
        return $resultado;
    }

    /**
     * @param $pk
     * @return array
     */
    function buscarUnProductoPorPk($pk){
        $resultado=$this->pageRows(0,1, "id=$pk");
        return $resultado[0];
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