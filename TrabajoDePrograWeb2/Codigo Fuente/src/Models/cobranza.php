<?php


class cobranza extends Model
{
    private $id;
    private $idTarjeta;
    private $fecha;
    private $idProducto;
    private $total;


    public function insertarCobranza(){
        $array=[

            "idTarjeta"=>$this->getIdTarjeta(),
            "fecha"=>$this->getFecha(),
            "idProducto"=>$this->getIdProducto(),
            "total"=>$this->getTotal()
        ] ;
        $this->setId($this->insert($array));
        return $this->getId();
    }
    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getIdTarjeta()
    {
        return $this->idTarjeta;
    }

    /**
     * @param mixed $idTarjeta
     */
    public function setIdTarjeta($idTarjeta)
    {
        $this->idTarjeta = $idTarjeta;
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
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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