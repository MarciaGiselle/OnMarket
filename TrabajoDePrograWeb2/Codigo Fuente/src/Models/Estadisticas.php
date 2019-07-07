<?php


class Estadisticas extends Model
{
    private $id;
    private $id_Producto;
    private $cantidad;



     public function verificarSiExisteEstadistica($pk){

         $resultado=$this->pageRows(0,1, "id_Producto=$pk");
         if(empty($resultado[0])){
             return true;
         }
          return false;



     }
    public function TrearEstadisticaPorPkProducto($pk){

        $resultado=$this->pageRows(0,1, "id_Producto=$pk");
        return $resultado[0];





    }

    public function AumentarCantidadEnUnaEstadisticaPorPk(){

        $array=[
            "id"=> $this->getId(),
            "cantidad"=>$this->getCantidad(),

        ] ;

        return $this->update($array);



    }
    public function insertarEstadistica(){
        $array=[

            "id_Producto"=>$this->getIdProducto(),
            "cantidad"=>$this->getCantidad(),

        ] ;
        $this->setId($this->insert($array));
        return $this->getId();
    }


    public function EstadisticasDeProductos($campo,$limit){

       return $this->getFieldsASD($campo,$limit);



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
    public function getIdProducto()
    {
        return $this->id_Producto;
    }

    /**
     * @param mixed $id_Producto
     */
    public function setIdProducto($id_Producto)
    {
        $this->id_Producto = $id_Producto;
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



}