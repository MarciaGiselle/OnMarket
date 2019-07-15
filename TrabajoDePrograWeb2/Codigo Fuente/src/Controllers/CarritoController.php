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
        $d["nombreUsuario"]= $_SESSION["name"];


        if ((isset($_SESSION["carrito"]))) {
            $d["mensaje"]=  " " ;
            $productoABuscar = new Producto();
            $formaentrega=new FormaEntrega();
            $productosEncontrados = [];
            $cantidades = [];

            $arrayCarritoProducto = [];

            for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
                $pk = $_SESSION["carrito"][$i]["id"];
                array_push($productosEncontrados, $productoABuscar->filasPorPk($pk));
            }
            for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
                $cantidad = $_SESSION["carrito"][$i]["cantidad"];
                array_push($cantidades, $cantidad);
            }

            for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
                $producto = $productosEncontrados[$i];
                $cantidad = $cantidades[$i];
                $arrayProducto = [
                    "producto" => $producto,
                    "cantidad" => $cantidad,
                    ];
                array_push($arrayCarritoProducto, $arrayProducto);

            }
            $d["listaProductos"] = $arrayCarritoProducto;

            }

        $this->set($d);

        $this->render(Constantes::CARRITOVIEW);
    }

    function agregarAlCarrito($idProducto)
    {

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($idProducto['data']));
        $idVendedor=$data->idVendedor;
        if (isset($_SESSION["logueado"])) {
            if($_SESSION["logueado"] != $idVendedor) {
            $id = $data->idProducto;
            $cantidad = $data->cantidad;

            if (isset($_SESSION["logueado"])) {
                if (!isset($_SESSION["carrito"])) {
                    $_SESSION["carrito"] = array();
                    $array = ["id" => $id, "cantidad" => $cantidad];
                    array_push($_SESSION["carrito"], $array);
                } else {
                    $array = ["id" => $id, "cantidad" => $cantidad];
                    array_push($_SESSION["carrito"], $array);
                }

            }
        }else{
            throw new CarritoFallido("no puede comprarse a si mismo ", CodigoError::CarritoFallido);
        }
        } else {
                throw new CarritoFallido("Debe iniciar sesión para administrar su carrito de compras.", CodigoError::CarritoFallido);
            }
            echo json_encode($id);


    }


    function eliminarProducto($producto)
    {
        header("Content-type: application/json");
        $data = json_decode(utf8_decode($producto['data']));

        $idProducto = $data->idEliminado;
        if (!empty($idProducto)) {
            for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
                if ($_SESSION["carrito"][$i]["id"] == $idProducto) {
                    unset($_SESSION['carrito'][$i]);
                    $_SESSION["carrito"] = array_values($_SESSION["carrito"]);
                }
            }


        } else {
            throw new EliminarCarritoException("No hay ningún producto seleccionado.", CodigoError::EliminarCarritoFallido);
        }

        echo json_encode(true);

    }

}