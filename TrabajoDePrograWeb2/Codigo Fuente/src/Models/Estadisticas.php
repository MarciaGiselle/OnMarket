<?php


class Estadisticas extends Model
{
    private $id;
    private $id_Producto;
    private $cantidad;
    private $id_tipo;



     public function traerEstadistica($pk,$tipo){

         $resultado=$this->pageRows(0,1, "id=$pk and id_tipo=$tipo");
         return $resultado[0];



     }

    public function traerEstasdisticasProd(){
            return   $this->getFieldsAsdProd("cantidad",5,1);
}
        public function traerEstasdisticasCat(){
        return   $this->getFieldsAsdProd("cantidad",5,2);
    }

    public function traerEstasdisticasMontos(){
        return   $this->getFieldsAsdProd("cantidad",5,3);
    }



    public function insertarEstadistica(){
        $array=[

            "id_tipo"=>$this->getIdTipo(),
            "cantidad"=>1,

        ] ;
        $this->setId($this->insert($array));
        return $this->getId();
    }

    public function actualizarEstadistica(){
        $array=[
            "id"=>$this->getId(),
            "cantidad"=>$this->getCantidad(),

        ] ;
        $this->update($array);

    }


    /**
     * @return mixed
     */
    public function getIdTipo()
    {
        return $this->id_tipo;
    }

    /**
     * @param mixed $id_tipo
     */
    public function setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;
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