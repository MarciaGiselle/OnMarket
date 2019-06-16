<?php

class BuscadorController extends Controller
{
    function busqueda(){
        $d["title"] = "Busqueda";
        $this->set($d);
        $this->render(Constantes::BUSCADORVIEW);
    }

    function mostrar($datos)

    {

            $d["title"] = "Index";
            $id=$datos["idProducto"];
            var_dump($datos);
            $producto = new Producto();
            $encontrado= $producto->PorPk($id);
            $d["nombre"] = $encontrado[0]["nombre"];
            $d["precio"] = $encontrado[0]["precio"];
            $d["cantidad"] = $encontrado[0]["cantidad"];
            $d["descripcion"] = $encontrado[0]["descripcion"];
            $d["idProducto"] = $encontrado[0]["idProducto"];



            $imagen =new Imagen();
            $d["imagen"] = $imagen->imagenPk($id);;
            $this->set($d);
            $this->render(Constantes::MOSTRARVIEW);




    }

    function buscarProducto($buscador){

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($buscador['data']));

        $nombreProducto= $data->nombreProducto;

            if(FuncionesComunes::validarCadena($nombreProducto)){
                $productoABuscar = new Producto();
                $imagenABuscar= new Imagen();

                $productoABuscar->setNombre($nombreProducto);

                $idsProductos=$productoABuscar->buscarProductoEnLaBase();

                if(empty($idsProductos)){
                    throw new ProductoNoEncontradoException("No hay coincidencias con la búsqueda", CodigoError::ProductoNoEncontrado);
                }else{

                $productosEncontrados=[];
                $imagenesEncontradas=[];

                foreach ($idsProductos as $pk){
                    array_push($productosEncontrados, $productoABuscar->filasPorPk($pk));
                    array_push($imagenesEncontradas, $imagenABuscar->primerImagenPorPk($pk));
                }

                $arrayProductoImagen=[];

                for($i=0;$i<count($idsProductos); $i++){
                    $producto=$productosEncontrados[$i];
                    $imagen=$imagenesEncontradas[$i];
                    $arrayProducto=[
                        "prod"=>$producto,
                        "imagen"=>$imagen];
                    array_push($arrayProductoImagen, $arrayProducto);

                }

                }
                echo json_encode($arrayProductoImagen);

    }
    }






}