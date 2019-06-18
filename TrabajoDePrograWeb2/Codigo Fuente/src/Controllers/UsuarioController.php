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

    function agregarAlCarrito($idProducto){

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($idProducto['data']));

        $id=$data->idProducto;
        $nombre=$data->nombre;
        $precio=$data->precio;
        $cantidad=$data->cantidad;

      if( $_SESSION["logueado"]) {
          if (!isset($_SESSION["carrito"])) {
              $_SESSION["carrito"] = array();
              $array = ["id" => $id, "precio" => $precio, "cantidad" => $cantidad, "nombre" => $nombre];
              array_push($_SESSION["carrito"], $array);
          } else {
              $array = ["id" => $id, "precio" => $precio, "cantidad" => $cantidad, "nombre" => $nombre];
              array_push($_SESSION["carrito"], $array);
          }

      }else{
              throw new CarritoFallido("Debe iniciar sesión", CodigoError::CarritoFallido);
      }

        echo json_encode($id);


    }

    function Compra($datos){
        header("Content-type: application/json");
        $data = json_decode(utf8_decode($datos['data']));
        $total=$data->total;
        $codigo=$data->codigo;
        $fecha=$data->fecha;
        $numeroTarjeta=$data->numeroTarjeta;


        $user=new usuario();
        $idUser=$user->traeIdPorNombre($_SESSION["logueado"]);
        if(isset($idUser)){
            $tarjeta= new tarjeta_de_credito();
            $tarjeta->setIdUser($idUser);
            $tarjeta->setCodSeguridad($codigo);
            $tarjeta->setFechaVencimiento($fecha);
            $idTarjeta=$tarjeta->insertar();
            if(isset($idTarjeta)) {
                $idCobranza=$tarjeta->pagar( $idTarjeta, $fecha,$total);

            }


        }else{
            throw new ExcentionRegistar("Compra fallida", CodigoError::ExcentionRegistar);
        }

        echo json_encode(true);




    }

}
 





   

