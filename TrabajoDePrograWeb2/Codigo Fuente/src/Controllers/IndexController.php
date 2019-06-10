<?php
class IndexController extends Controller
{
    function index()
    {
        $d["title"] = "Index";
        $this->set($d);
        $this->render(Constantes::INDEXVIEW);
    }


    function buscarProducto($buscador){
        echo '<alert>buscar</alert>';

            if(FuncionesComunes::validarCadena($buscador["buscarProducto"])){
            $productoABuscar=new Producto();
            $productoABuscar->setNombre($buscador["buscarProducto"]);

            $resultadosEncontrados=$productoABuscar->buscarProductoEnLaBase();

            foreach($resultadosEncontrados as $resultado){
                echo $resultado;

        }
        }else{
          echo "no coincidencias";
            //  throw new ProductoNoEncontrado("No hay coincidencias con la búsqueda");
        }

    }
}