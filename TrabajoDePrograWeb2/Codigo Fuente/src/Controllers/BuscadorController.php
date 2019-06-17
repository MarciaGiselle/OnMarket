<?php

class BuscadorController extends Controller
{
    function busqueda(){
        $d["title"] = "Busqueda";
        $this->set($d);
        $this->render(Constantes::BUSCADORVIEW);
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