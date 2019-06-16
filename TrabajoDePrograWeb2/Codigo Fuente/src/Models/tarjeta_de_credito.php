<?php
class tarjeta_de_credito extends Model{
   private $id;
   private $idUser;
   private $cod_seguridad;
   private $fecha_vencimiento;


  function pagar( $arrayIds, $idTarjeta,$total){
      $cobranza=new cobranza();
      $fecha_actual = date("y-m-d");
      $cobranza->setIdTarjeta($idTarjeta);
      $cobranza->setFecha($fecha_actual);
      $cobranza->setTotal($total);

  //    for para recorrer el array de ids e insertarlos
    $tope=count($arrayIds);
     for($i=0;$i>$tope;$i++ ){
      $cobranza->setIdProducto($arrayIds[$i]);
  }

     $idCobranza= $cobranza->insertarCobranza();



  }




public function traerPorIdDeUser($idUser){
    $res=$this->pageRows(0,1, "idUser='$idUser'");
    if(!empty($res[0])){
        $respuesta=$res[0];
        $id=$respuesta["id"];
        return $id;
    }else{
        return false;
    }
}


   /**
 * @return Database
 */
public function getDb()
{
    return $this->db;
}/**
 * @param Database $db
 */
public function setDb($db)
{
    $this->db = $db;
}/**
 * @return mixed
 */
public function getId()
{
    return $this->id;
}/**
 * @param mixed $id
 */
public function setId($id)
{
    $this->id = $id;
}/**
 * @return mixed
 */
public function getIdUser()
{
    return $this->idUser;
}/**
 * @param mixed $idUser
 */
public function setIdUser($idUser)
{
    $this->idUser = $idUser;
}/**
 * @return mixed
 */
public function getCodSeguridad()
{
    return $this->cod_seguridad;
}/**
 * @param mixed $cod_seguridad
 */
public function setCodSeguridad($cod_seguridad)
{
    $this->cod_seguridad = $cod_seguridad;
}/**
 * @return mixed
 */
public function getFechaVencimiento()
{
    return $this->fecha_vencimiento;
}/**
 * @param mixed $fecha_vencimiento
 */
public function setFechaVencimiento($fecha_vencimiento)
{
    $this->fecha_vencimiento = $fecha_vencimiento;
}





    }