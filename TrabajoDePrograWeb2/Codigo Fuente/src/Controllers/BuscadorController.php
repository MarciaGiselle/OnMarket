<?php

class BuscadorController extends Controller
{

   


    function buscarProducto($buscador){

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($buscador['data']));

        $d["title"] = "Buscador";
        $nombreProducto= $data->nombreProducto;

       

            if(FuncionesComunes::validarCadena($nombreProducto)){
               

                $productoABuscar = new Producto();
                $imagenABuscar= new Imagen();

                $productoABuscar->setNombre($nombreProducto);

                $idsProductos=$productoABuscar->buscarProductoEnLaBase();

                if(! $idsProductos==false){

                $productosEncontrados=[];
                $imagenesEncontradas=[];

                foreach ($idsProductos as $pk){
                    array_push($productosEncontrados, $productoABuscar->filasPorPk($pk));
                    array_push($imagenesEncontradas, $imagenABuscar->imagenesPorPk($pk));
                }


                $d["productos"]=$productosEncontrados;
                $d["imagenes"]=$imagenesEncontradas;


               $this->set($d);
                $this->render(Constantes::BUSCADORVIEW);


                }else{

                     throw new ProductoNoEncontradoException("No hay coincidencias con la búsqueda", CodigoError::ProductoNoEncontrado);
                }
                 echo json_encode(true);
            }
               
            


                 
        }




}