<?php


class tipo_valoracion extends Model{
    private $id;
    private $descripcion;

    public function definirIdPorPromedio($promedio){
        $menor=1.6;
        $intermedio=3.2;

        if($promedio>0 && $promedio <= $menor ){
            return 3;
        }elseif ($promedio> $menor && $promedio <= $intermedio ){
            return 2;
        }else{
            return 1;
        }

    }

    public function traerNombrePorId($id){
        $resultado=$this->pageRows(0,1,"id= $id");
        return $resultado[0]["descripcion"];

    }
    public function determinarTipoInicial(){
        //top
        return 1;
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