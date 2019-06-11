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
               // $imagenABuscar= new Imagen();

                $productoABuscar->setNombre($nombreProducto);

                $idsProductos=$productoABuscar->buscarProductoEnLaBase();
                if(empty($idsProductos)){
                    throw new ProductoNoEncontradoException("No hay coincidencias con la búsqueda", CodigoError::ProductoNoEncontrado);
                }
                echo json_encode(true);

            }
    }

    function mostrarResultados($idsProductos){
        $d["title"] = "Buscador";
        $productoABuscar = new Producto();
        $imagenABuscar= new Imagen();

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

}




}