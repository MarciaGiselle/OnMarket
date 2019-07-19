<?php


class valoracion extends Model{
    private $id;
    private $numero;
    private $comentario;
    private $idVendedor;
    private $idLogueado;
    private $idProducto;



    function insertarValoracion(){
        $array=[
            "numero"=> $this->getNumero(),
            "comentario"=>$this->getComentario(),
            "idVendedor"=>$this->getIdVendedor(),
            "idLogueado"=>$this->getIdLogueado(),
            "idProducto"=>$this->getIdProducto(),
        ];

        $this->setId($this->insert($array));
        return $this->getId();
    }

    public function realizarPromedioPorPk($pk){
        $resultado=$this->pageRows(0,100, "idVendedor=$pk");
        $suma=0;
        for ($i=0;$i < count($resultado); $i++){
            $suma+=$resultado[$i]["numero"];
        }
        $promedio=$suma/ count($resultado);
        return $promedio;

    }
    public function consultarEstadoDeValoracionPorPk($pk,$idVendedor){
        $miId=$_SESSION['logueado'];
        $resultado= $this->pageRows(0,100,"idVendedor='$idVendedor' and idProducto='$pk' and idLogueado='$miId'");
        if(empty($resultado)){
            return 1;
        }else{
            return 2;
        }

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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * @return mixed
     */
    public function getIdVendedor()
    {
        return $this->idVendedor;
    }

    /**
     * @param mixed $idVendedor
     */
    public function setIdVendedor($idVendedor)
    {
        $this->idVendedor = $idVendedor;
    }

    /**
     * @return mixed
     */
    public function getIdLogueado()
    {
        return $this->idLogueado;
    }

    /**
     * @param mixed $idLogueado
     */
    public function setIdLogueado($idLogueado)
    {
        $this->idLogueado = $idLogueado;
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