<?php

class BuscadorController extends Controller
{
    function buscarProducto($buscador){

        $d["title"] = "Buscador";


        if(isset($buscador["buscarProducto"])){
            $nombreProducto = $buscador["buscarProducto"];

            if(FuncionesComunes::validarCadena($nombreProducto)){
                $productoABuscar = new Producto();

                $productoABuscar->setNombre($nombreProducto);

                $idsProductos=$productoABuscar->buscarProductoEnLaBase();
                $productosEncontrados=[];

                foreach ($idsProductos as $pk){
                    array_push($productosEncontrados, $productoABuscar->filasPorPk($pk));
                }


                $d["resultado"]=$productosEncontrados;

                $this->set($d);
                $this->render(Constantes::BUSCADORVIEW);


                }

            }else{
                echo "no hay coincidencias";
                //  throw new ProductoNoEncontrado("No hay coincidencias con la búsqueda");
            }

        }

}