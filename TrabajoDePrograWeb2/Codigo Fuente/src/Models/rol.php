

<?php 
class Rol extends Model
{
    private $id;
    private $tipo;


    public  function determinarRol(){
        $resultado=$this->pageRows(0,1,"id=1");
        if(empty($resultado)){
            return 1;
        }else{
            return 2;}

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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $nombreCategoria
     */
    public function setTipo($tipo)
    {
        $this->tipo= $tipo;
    }








}