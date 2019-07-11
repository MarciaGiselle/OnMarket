<?php


class FormaEntrega extends Model
{
    private $idEntrega;
    private $descripcion;

    function obtenerIdMetodoEntrega($entrega){

        if(count($entrega)>1){
             $res=$this->pageRows(0,2, " descripcion='$entrega[0]' OR descripcion='$entrega[1]' ");
        }else{
            $res=$this->pageRows(0,1, " descripcion='$entrega[0]' ");
        }
        if(!empty($res[0])){
           for($i=0; $i<count($res);$i++){
               $idArray[$i]=$res[$i]['idEntrega'];
           }
            return $idArray;
        }else{
            return false;
        }
    }

    function traerEntrega($pk){
        $resultado=$this->pageRows(0,1, "idEntrega=$pk");

        return $resultado[0];
    }

    function traerTodas(){
        $resultado=$this->pageRows(0,10);

        return $resultado;
    }
    /**
     * @return mixed
     */
    public function getIdEntrega()
    {
        return $this->idEntrega;
    }

    /**
     * @param mixed $idEntrega
     */
    public function setIdEntrega($idEntrega)
    {
        $this->idEntrega = $idEntrega;
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

   

   
}