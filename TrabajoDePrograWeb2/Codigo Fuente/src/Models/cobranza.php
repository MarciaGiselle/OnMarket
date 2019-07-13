<?php


class cobranza extends Model
{
    private $id;
    private $idTarjeta;
    private $fecha;
    private $idProducto;
    private $cantidad;
    private $total;
    private $idComprador;
    private $idVendedor;
    private $idCuenta;


 public function traerTodosLosIdDeProdDeLaCobranzas(){
     $resultado= $this->pageRows(0,400);
     $array=[ ];
     if(!empty($resultado)){
         foreach($resultado as $r){
            $id= $r["idProducto"];
             array_push($array,$id);
         }

     }
     return $array;

 }

    public function traerTodosLosMonstosDeLaCobranzas(){
        $resultado= $this->pageRows(0,400);
        $array=[ ];
        if(!empty($resultado)){
            foreach($resultado as $r){
                $total= $r["total"];
                array_push($array,$total);
            }

        }
        return $array;

    }

    public function insertarCobranza(){
        $array=[

            "idTarjeta"=>$this->getIdTarjeta(),
            "fecha"=>$this->getFecha(),
            "idProducto"=>$this->getIdProducto(),
            "idVendedor"=>$this->getIdVendedor(),
            "idComprador"=>$this->getIdComprador(),
            "cantidad"=>$this->getCantidad(),
            "total"=>$this->getTotal(),
            "idCuenta" => $this->getIdCuenta(),
        ] ;
        $this->setId($this->insert($array));
        return $this->getId();
    }

    function consultarCobranzasDelMes($mes,$a){
     //por medio de la fecha, traer solo las q corresponden a ese mes
        $resultado = $this->pageRows(0, PHP_INT_MAX, "MONTH(fecha)=$mes AND YEAR(fecha)=$a");
        return $resultado;
    }


    /**
     * @return mixed
     */
    function buscarMisCompras($id){
        $resultado=$this->pageRows(0,100,"idComprador=$id");
        return $resultado;
}

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

    /**
     * @return mixed
     */
    public function getIdComprador()
    {
        return $this->idComprador;
    }

    /**
     * @param mixed $idComprador
     */
    public function setIdComprador($idComprador)
    {
        $this->idComprador = $idComprador;
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

    /**
     * @return mixed
     */
    public function getIdCuenta()
    {
        return $this->idCuenta;
    }

    /**
     * @param mixed $idCuenta
     */
    public function setIdCuenta($idCuenta)
    {
        $this->idCuenta = $idCuenta;
    }



}