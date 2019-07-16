<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 11:12
 */

class Usuario extends Model
{
    private $id;
    private $name;
    private $lastname;
    private $password;
    private $cuit;
    private $email;
    private $userName;
    private $sexo;
    private $rol;
    private $direccion;
    private $estado;
    private $idTipo;

    public  function insertarRegistro(){

        $array=[

            "name"=> $this->getName(),
            "lastname"=> $this->getLastname(),
            "password"=>$this->getPassword(),
            "cuit"=>$this->getCuit(),
            "email"=>$this->getEmail(),
            "userName"=>$this->getUserName(),
            "sexo"=>$this->getSexo(),
            "rol"=>$this->getRol(),
            "estado"=>$this->getEstado(),
            "direccion"=>$this->getDireccion(),
            "idTipo"=> $this->getIdTipo()

        ];

        $this->setId($this->insert($array));
        return $this->getId();

    }

    function buscarUsuario(){
    $resultado=$this->pageRows(0,1,"name= '$this->name' and password='$this->password'");
    if (!empty($resultado)){
        return $resultado[0];

    }else{
        return false;
    }
    }

    function consultarNombre($pk){
        $resultado=$this->pageRows(0,1,"id= $pk");

            return $resultado[0]["name"];

    }
    public function buscarRolDelUsuario($id){
        $resultado=$this->pageRows(0,1,"id='$id'");
        if (!empty($resultado)){
            $respuesta=$resultado[0];
            $rol=$respuesta["rol"];
            return $rol;
        }else{
            return false;
        }
    }
    public  function consultarLogin(){
        $error=0;
        $mensaje="";
        $resultado=$this->pageRows(0,1,"userName='$this->userName' and password='$this->password'");

        if (!empty($resultado)){
           return true;
        }else{
            return false;
        }




    }

    public  function consultarUserName(){
     $error=0;
    $mensaje="";
    $resultado=$this->pageRows(0,1,"userName='$this->userName'");
    
    if (!empty($resultado)){
       $error.=1;
       $mensaje.="nombre de usuario invalido"." ";
    }



    if($error>0){
            echo "<script> alert('$mensaje'); </script>";
            return false;
        }else{
            return true;
        }
       
    }
    public  function consultarPass($pass){
        $error=0;


        if (!empty($resultado)){
            return false;
        }else{
            return true;
        }




    }
  public  function traeIdPorNombre($nombre){
      $res=$this->pageRows(0,1, "userName='$nombre'");
      if(!empty($res[0])){
          $respuesta=$res[0];
          $id=$respuesta["id"];
          return $id;
      }else{
          return false;
      }
}
  function traerUserPorPk($pk){
      $res=$this->pageRows(0,1, "id='$pk'");
      if(!empty($res[0])){
          return $res[0];
      }else{
          return false;
      }

  }
  function bloquearUsuario($pk){
    $array=[
        "id"=> $pk,
        "estado"=>0,
    ];


    return $this->update($array);
}

    function desbloquearUsuario($pk){
        $array=[
            "id"=> $pk,
            "estado"=>1,
        ];


        return $this->update($array);
    }


  function validarFormatos($terminosYcondiciones){

      //validacion de formatos
           $error=0;
           $mensaje="";
           //validar terminos y condiciones

           if($terminosYcondiciones=="no"){
         $error.=1;
         $mensaje.="acepte los terimons y condiciones"." ";
        }
         //validacion de nombre que no este vacio y sean solo letras
     if(!preg_match('/[A-Za-z]+/', $this->getName())) {
         $error.=1;
         $mensaje.="nombre invalido"." ";
        }
         //validacion del apellido que no este vacio y sean solo letras
    if(!preg_match('/[A-Za-z]+/', $this->getLastname())) {
        $error.=1;
         $mensaje.="apellido invalido"." ";
        }
        //validar q sea un correo
        if(!preg_match("/^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/", $this->getEmail())){
            $error.=1;
         $mensaje.="correo invalido"." ";
        }
        //validar que el cuit sean numeros
        if(!preg_match('/[0-9]+/',$this->getCuit())) {
            $error.=1;
        $mensaje.="cuit invalido"." ";
        }
        //pass numeros Agregar letras

        if(!preg_match('/[0-9]+/',$this->getPassword())) {
            $error.=1;
        $mensaje.="password invalido"." ";
        }


        if($error>0){
            echo "<script> alert('$mensaje') </script>";
            return false;
        }else{
            return true;
        }

    }

    public function consultarEstadoDelUsuario($pk){
        $resultado=$this->pageRows(0,1,"id='$pk'");
        if (!empty($resultado)){
            $respuesta=$resultado[0];
            $estado=$respuesta["estado"];
            return $estado;
        }else{
            return false;
        }
    }

  public function traerTodosLosUsuarios(){

      $res=$this->pageRows(0,100);
      if(!empty($res[0])){
          $array=[];
          for($i=0 ;$i< count($res);$i++) {
               $id = $res[$i]["id"];
               $id_admin=$_SESSION["logueado"];
               if($id!==$id_admin){
               array_push($array,$res[$i] );
          }}
          return $array;
      }else{
          return false;
      }
  }

    /**
     *
     */



   public function buscarUsuariosPorUserName($nombre){
       $resultado=$this->pageRows(0,100, "userName like '%$nombre%'");
       return $resultado;
   }

   public function actualizarTipo(){
       $array=[
           "id"=> $this->getId(),
           "idTipo" => $this->getIdTipo()
       ];

       return $this->update($array);

   }



    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * @param mixed $idTipo
     */
    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;
    }







    function validarFormatosLogin(){


            return true;


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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * @param mixed $cuit
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }


    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }


 
   

 

    


    

    
    

}