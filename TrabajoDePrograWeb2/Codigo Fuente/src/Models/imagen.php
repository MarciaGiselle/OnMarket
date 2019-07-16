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

   function cambiarTamaño($temporal){
       //esto se haria antes del metodo
      // $temporal=$_FILES["imagen"]["tmp_name"];
       $original=imagecreatefromjpeg($temporal);
       $copia=imagecreatetruecolor(300,300);
       $r=imagecopyresampled($copia,$original,0,0,0,0,300,300,imagesx($original),imagesy($original));
       return $copia;
   }
  function actualizarImagen(){
      $array=[
          "id"=>$this->getId(),
          "nombre"=> $this->getNombre(),
          "idProducto"=>$this->getIdProducto()
      ];
      $this->update($array);
  }
    function eliminarImagen(){
        $array=[
            "id"=>$this->getId(),
            "idProducto"=>$this->getIdProducto()
        ];
        $this->delete($array);
    }

    function insertarImagen(){
        $array=[
            "nombre"=> $this->getNombre(),
           "idProducto"=>$this->getIdProducto()
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