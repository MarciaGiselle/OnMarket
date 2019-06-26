
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

    function modificarProducto(){
        $array=[
            "idProducto"=> $this->getIdProducto(),
            "nombre"=> $this->getNombre(),
            "descripcion"=>$this->getDescripcion(),
            "cantidad"=>$this->getCantidad(),
            "precio"=>$this->getPrecio(),
            "idCategoria"=>$this->getIdCategoria(),
        ] ;


        $sql="UPDATE producto SET nombre='$this->nombre', descripcion='$this->descripcion', cantidad='$this->cantidad', precio='$this->precio' WHERE idProducto='$this->idProducto'";

        if ($this->db->query($sql)) {
            return true;
        }else{
            return false;
        }

       // return $this->update($array);

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
                array_push($idArray, $resultadoDeLaBusqueda[$i]["idProducto"]);
             }
        }
        return $idArray;
    }

    function filasPorPk($pk){
        $resultado=$this->pageRows(0,100, "idProducto=$pk");
      //$resultado=$this->selectByPk($pk);
        return $resultado;
    }

    /**
     * @param $pk
     * @return array
     */
    function buscarUnProductoPorPk($pk){
        $resultado=$this->pageRows(0,1, "idProducto=$pk");
        return $resultado[0];
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