<?php


class Imagen extends Model
{
    private $id;
    private $nombre;
    private $idProducto;

   /* function adaptiveResizeImage($imagePath, $width, $height, $bestFit)
    {
        $imagick = new Imagick(realpath($imagePath));
        $imagick->adaptiveResizeImage($width, $height, $bestFit);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
*/

    function insertarImagen(){
        $array=[
            "nombre"=> $this->getNombre(),
           "idProducto"=>$this->getIdProducto(),
        ];
        $this->setId($this->insert($array));
        return $this->getId();
    }


    function primerImagenPorPk($pk){
        $resultado=$this->pageRows(0,1, "idProducto=$pk");
        $imagenes=[];
        for($i=0;$i<count($resultado);$i++){
            array_push($imagenes, $resultado[$i]);
        }
        /*foreach ($resultado as $imagen){
            array_push($imagenes, $imagen[$i]["nombre"]);
        }*/
        return $imagenes;
    }

    function imagenPk($pk){
        $resultado=$this->pageRows(0,10, "idProducto=$pk");
        //$resultado=$this->selectByPk($pk);
        return $resultado;
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