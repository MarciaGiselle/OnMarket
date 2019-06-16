<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 11:41
 */

class UsuarioController extends Controller
{

    function login($usuario)
    {

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($usuario['data']));

        $nombre = $data->nombre;
        $pass = $data->password;

        $passSHA = sha1($pass);
        $usuario = new Usuario ();
        $usuario->setName($nombre);
        $usuario->setPassword($passSHA);

        if ($usuario->validarFormatosLogin()) {
            $idUsuario = $usuario->buscarUsuario();
            $usuario->setId($idUsuario);
            $_SESSION["idUser"] = $idUsuario;


            if (!empty($idUsuario)) {
                $_SESSION["logueado"] = $nombre;
                $d["title"] = "MiCuenta";

            }else{

               throw new NombreOPassInvalidoException("Nombre o password incorrectos",CodigoError::NombreOPassInvalidoException);
            }

        echo json_encode(true);
    }
}

    function cerrarSesion()
    {
        session_destroy();
        unset($_SESSION["carrito"]);
       $d["title"] = "Index";
       $this->set($d);
        header("Location:" . getBaseAddress());
    }


    function mostrarInicio()
    {
        $d["title"] = "Index";
        $this->set($d);
        $this->render(Constantes::USUARIOVIEW);

    }

    function carrito($idProducto){

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($idProducto['data']));

        $id=$data->idProducto;
        $nombre=$data->nombre;
        $precio=$data->precio;
        $cantidad=$data->cantidad;
      if( $_SESSION["logueado"]) {
          if (!isset($_SESSION["carrito"])) {
              $_SESSION["carrito"] = array();
              $_SESSION["contador"] = 0;
              $i = $_SESSION["contador"] += 1;
              $array = ["id" => $id, "precio" => $precio, "cantidad" => $cantidad, "nombre" => $nombre];
              $_SESSION["carrito"][$i] = $array;

          } else {
              $i = $_SESSION["contador"] += 1;
              $array = ["id" => $id, "precio" => $precio, "cantidad" => $cantidad, "nombre" => $nombre];
              $_SESSION["carrito"][$i] = $array;

          }

      }else{

              throw new CarritoFallido("las contraseñas no son iguales", CodigoError::CarritoFallido);
      }

        echo json_encode($id);


    }




    function Compra($datos){
        header("Content-type: application/json");
        $data = json_decode(utf8_decode($datos['data']));
        $total=$data->total;


        $arrayIds= array();
        $tope=count($_SESSION["carrito"]);
        for($i=1;$i<=$tope;$i++ ){
            $arrayIds[$i]=$_SESSION["carrito"][$i]["id"];

        }

        $user=new usuario();
        $idUser=$user->traeIdPorNombre($_SESSION["logueado"]);
        if(isset($idUser)){
            $tarjeta= new tarjeta_de_credito();
            $idTarjeta=$tarjeta->traerPorIdDeUser($idUser);
            $tarjeta->pagar( $arrayIds , $idTarjeta,$total);




        }

        echo json_encode(true);




    }

}
 





   

