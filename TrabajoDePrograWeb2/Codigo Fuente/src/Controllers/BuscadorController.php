<?php

class BuscadorController extends Controller
{
    function buscarProducto($buscador){

        $d["title"] = "Buscador";
        $this->set($d);
        $this->render(Constantes::BUSCADORVIEW);

        if(isset($buscador["buscarProducto"])){
            $nombreProducto = $buscador["buscarProducto"];

            if(FuncionesComunes::validarCadena($nombreProducto)){
                $productoABuscar = new Producto();

                $productoABuscar->setNombre($nombreProducto);

                $resultadosEncontrados=$productoABuscar->buscarProductoEnLaBase();
                $field=array();
                $i=0;
                foreach($resultadosEncontrados as $pkEncontrada){

                    // $pkEncontrada=(int)$pkEncontrada;

                    $field[$i]=$productoABuscar->filasPorPk($pkEncontrada);
                    $i++;

                }
                $d["resultado"]=$field[0];
                $this->set($d);
var_dump($d);
                //esto deberia ser otra funcion o algo asi, no me detuve a ver como mostrarlo
                echo "<table><tr>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>CANTIDAD</th>
                    <th>DESCRIPCION</th>
                    <th>PRECIO</th>
                    </tr>";
                foreach ($field as $fila){

                    foreach ($fila as $producto){

                        echo "<tr>
                       <td>" . $producto['idProducto']. "</td>
                       <td>" . $producto['nombre']. "</td>
                       <td>" . $producto['cantidad']. "</td>
                       <td>" . $producto['descripcion']. "</td>
                         <td>" . $producto['precio']. "</td>
                       </tr>";


                    }
                } echo "</table>";

                //var_dump($field);
            }else{
                echo "no coincidencias";
                //  throw new ProductoNoEncontrado("No hay coincidencias con la búsqueda");
            }

        }
    }
}