<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 11:41
 */

class CarritoController extends Controller
{
    function verCarrito()
    {
        $d["title"] = "Mi carrito";


        if (!isset($_SESSION["carrito"])) {
          echo "No ha cargado ningún producto al carrito";
        } else {
            $productoABuscar=new Producto();
            $productosEncontrados=[];
            $cantidades=[];
            $arrayCarritoProducto=[];
            for($i=0;$i<count($_SESSION["carrito"]); $i++){
                $pk=$_SESSION["carrito"][$i]["id"];
                array_push($productosEncontrados, $productoABuscar->filasPorPk($pk));
            }
            for($i=0;$i<count($_SESSION["carrito"]); $i++){
                $cantidad=$_SESSION["carrito"][$i]["cantidad"];
                array_push($cantidades, $cantidad);
            }
            for($i=0;$i<count($_SESSION["carrito"]); $i++){
                $producto=$productosEncontrados[$i];
                $cantidad=$cantidades[$i];
                $arrayProducto=[
                    "producto"=>$producto,
                    "cantidad"=>$cantidad];
                array_push($arrayCarritoProducto, $arrayProducto);

            }
            $d["listaProductos"] = $arrayCarritoProducto;
            $this->set($d);

            $this->render(Constantes::CARRITOVIEW);
        }
    }

    function agregarAlCarrito($idProducto){

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($idProducto['data']));

        $id=$data->idProducto;
        $cantidad=$data->cantidad;

        if( $_SESSION["logueado"]) {
            if (!isset($_SESSION["carrito"])) {
                $_SESSION["carrito"] = array();
                $array = ["id" => $id,  "cantidad" => $cantidad];
                array_push($_SESSION["carrito"], $array);
            } else {
                $array = ["id" => $id,  "cantidad" => $cantidad];
                array_push($_SESSION["carrito"], $array);
            }

        }else{
            throw new CarritoFallido("Debe iniciar sesión", CodigoError::CarritoFallido);
        }

        echo json_encode($id);


    }



}