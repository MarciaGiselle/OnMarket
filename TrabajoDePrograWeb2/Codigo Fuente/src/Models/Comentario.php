<?php


class Comentario extends Model
{
    private $id;
    private $mensaje;
    private $fecha;
    private $fechaActual;
    private $id_Usuario;
    private $id_Publicacion;
    private $id_comentario2;

public function insertarComentario(){
    $array=[

        "fecha"=> $this->getFecha(),
        "mensaje"=>$this->getMensaje(),
        "id_Usuario"=>$this->getIdUsuario(),
        "id_Publicacion"=> $this->getIdPublicacion(),
    ];


    $this->setId($this->insert($array));
    return $this->getId();
}
    public function actualizarComentario(){
        $array=[

            "id"=> $this->getId(),
           "id_comentario2"=> $this->getIdComentario2(),
        ];


       $this->update($array);

    }
public function traerComentariosPorPublicacion($pk){

    $resultado=$this->pageRows(0,20, "id_Publicacion= $pk ORDER BY fecha DESC");

    return $resultado;
}


    public function traerRespuestasPorPublicacion($array){
    $arrayRespuestas=[];
      for($i=0;$i<count($array);$i++){
          $pk=$array[$i]["id_comentario2"];
          if(!empty($pk)){

          $resultado = $this->pageRows(0, 1, "id=$pk ");
              array_push(  $arrayRespuestas,$resultado[0]);
          }else{
              array_push(  $arrayRespuestas,null);
          }

      }
        return   $arrayRespuestas;
    }

    public function traerComentariosPorPK($pk){

        $resultado=$this->pageRows(0,1, "id=$pk");

        return $resultado[0];
    }
    /**
     * @return mixed
     */
    public function getFechaActual()
    {
        return $this->fechaActual;
    }

    /**
     * @param mixed $fechaActual
     */
    public function setFechaActual($fechaActual)
    {
        $this->fechaActual = $fechaActual;
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
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_Usuario;
    }

    /**
     * @return mixed
     */
    public function getIdPublicacion()
    {
        return $this->id_Publicacion;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $mensaje
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @param mixed $id_Usuario
     */
    public function setIdUsuario($id_Usuario)
    {
        $this->id_Usuario = $id_Usuario;
    }

    /**
     * @param mixed $id_Publicacion
     */
    public function setIdPublicacion($id_Publicacion)
    {
        $this->id_Publicacion = $id_Publicacion;
    }

    /**
     * @return mixed
     */
    public function getIdComentario2()
    {
        return $this->id_comentario2;
    }

    /**
     * @param mixed $id_comentario2
     */
    public function setIdComentario2($id_comentario2)
    {
        $this->id_comentario2 = $id_comentario2;
    }



}