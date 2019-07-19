<?php

class BuscadorController extends Controller
{
    function busqueda(){
        $d["title"] = "Busqueda";
        if(isset($_SESSION["logueado"])){
            $d["nombreUsuario"]= $_SESSION["name"];
        }
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

                $publicacion=new Publicacion();

                $idsFinal=[];
                $publicaciones=[];

                for($i=0;$i<count($idsProductos) ;$i++){

                    array_push($publicaciones,$publicacion->traerPublicaciondelProducto($idsProductos[$i]));
                }
                foreach($publicaciones as $p){
                    if($p["id_Estado"]==1){
                        array_push($idsFinal,$p["id_Producto"]);
                    }

                }


                if(empty($idsFinal)){
                    throw new ProductoNoEncontradoException("No hay coincidencias con la búsqueda", CodigoError::ProductoNoEncontrado);
                }else{

                $productosEncontrados=[];
                $imagenesEncontradas=[];

                foreach ($idsFinal as $pk){
                    array_push($productosEncontrados, $productoABuscar->filasPorPk($pk));
                    array_push($imagenesEncontradas, $imagenABuscar->primerImagenPorPk($pk));
                }

                //Parte para las estadisticas de los productos mas buscados
                $estadistica=new Estadisticas();
                   

                    for($i=0;$i< count($idsFinal);$i++){
                         $prod=new Producto();
                         $producto=$prod->buscarUnProductoPorPk($idsFinal[$i]);

                        if(empty($producto["id_estadistica"])){
                            $estadistica=new Estadisticas();
                             $estadistica->setCantidad(1);
                             $estadistica->setIdTipo(1);
                             $idEstadistica=$estadistica->insertarEstadistica();
                             $prod->setId($producto["id"]);
                             $prod->setIdEstadisticas($idEstadistica);
                             $prod->insertarEstadisticasAlProducto();

                        }else{
                            // se agrega a la estadistica
                            $estadistic=new Estadisticas();
                            $estadisticaDelProd=$estadistic->traerEstadistica($producto["id_estadistica"],1);

                            $estadistic->setId($estadisticaDelProd["id"]);
                            $cantidad=$estadisticaDelProd["cantidad"]+1;

                            $estadistic->setCantidad($cantidad);
                            $estadistic->actualizarEstadistica();




                        }
                    }

                $arrayProductoImagen=[];

                for($i=0;$i<count($idsFinal); $i++){
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