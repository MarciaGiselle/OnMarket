<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 11:41
 */

class ProductoController extends Controller
{


    function publicar()
    {
        $d["title"] = "Publicar";
        $this->set($d);
        $this->render(Constantes::NAVLOGUEADOVIEW);
        $this->render(Constantes::PUBLICARVIEW);
        $this->render(Constantes::FOOTERVIEW);

    }

    /**
     * @param $publicacion
     * @return mixed
     */
    function altaProducto($publicacion)
    {
        $producto = new Producto();
        $categoria = new Categoria();

        $producto->setNombre($publicacion["nombre"]);
        $producto->setDescripcion($publicacion["descripcion"]);
        $producto->setCantidad($publicacion["cantidad"]);
        $producto->setPrecio($publicacion["precio"]);

        //categoria obtener id y setearlo
        $idCategoria= $categoria->obtenerIdCategoria($publicacion["categoria"]);
        if ($idCategoria != false) {
            $producto->setIdCategoria($idCategoria);
        }

        //crear array imagenes obtenidas en el input
       if(($publicacion['imagen']['name']))

        $count = count($publicacion['imagen']['name']);
        echo "contador".$count. "<br>";
        var_dump($_FILES['imagen']['name']);
        for ($i = 0; $count > $i; $i++) {
            $arrayImagenes[$i] = $_FILES['imagen']['name'][$i];
        }


        //una vez seteados, voy al modelo y valido los formatos
        if ($producto->validarFormatos()) {
            echo "valido al producto";
            if ($this->validarImagenes($arrayImagenes)) {
                //Insertar Producto en la tabla
                $idProducto = $producto->insertarProducto();
                //guardar imagenes en la base
                $this->tratarImagenes($arrayImagenes, $idProducto);
                $this->altaPublicacion($producto, $idProducto);
            }


        }
    }
    function validarImagenes($array){
        $error = 0;
        $mensaje = "";
        if (count($array) == 0) {
            $error.=1;
            $mensaje .= "Seleccione una imagen";
        }

        if (count($array) > 10) {
            $error.=1;
            $mensaje .= "Limite de imagenes superado";
        }

        if ($error > 0) {
            echo '<div class="alert alert-danger" role="alert">'
                . $mensaje .
                '</div>';
        } else {
            return true;
        }

    }

    function  tratarImagenes($arrayImagenes,$idProducto){

         foreach ($arrayImagenes as $imagen){
            $imagenNueva=new Imagen();
            $imagenNueva->setNombre($imagen);
            $imagenNueva->setIdProducto($idProducto);
            $imagenNueva->insertarImagen();
    }
    }

    function altaPublicacion($producto,$idProducto)
    {
        $publicar=new Publicacion();
        $publicar->setTitulo($producto["titulo"]);
        $fecha_actual = date("Y-M-D");
        $publicar->setFecha($fecha_actual);
        $publicar->setId_user($_SESSION["idUser"]);
        $publicar->setIdProducto($idProducto);

        $idPublicacion=$publicar->insertarPublicacion();
        return $idPublicacion;
    }




}




