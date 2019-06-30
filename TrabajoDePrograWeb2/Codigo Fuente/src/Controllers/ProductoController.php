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
        $this->render(Constantes::PUBLICARVIEW);

    }


    function altaProducto($publicacion)
    {

        $producto = new Producto();
        $categoria = new Categoria();
        $error=0;
        //conceptos generales
        if (FuncionesComunes::validarCadena($publicacion["nombre"])) {
            $producto->setNombre($publicacion["nombre"]);
        }else{
            $error.=1;
        }
        if (FuncionesComunes::validarCadenaNumerosYEspacios($publicacion["descripcion"])) {
            $producto->setDescripcion($publicacion["descripcion"]);
        }else{
            $error.=1;
        }
        if (FuncionesComunes::validarNumeros($publicacion["cantidad"])) {
            $producto->setCantidad($publicacion["cantidad"]);
        }else{
            $error.=1;
        }
        if (FuncionesComunes::validarNumeros($publicacion["precio"])) {
            $producto->setPrecio($publicacion["precio"]);
        }else{
            $error.=1;
        }
        if (!empty($publicacion["categoria"]) && FuncionesComunes::validarCadena($publicacion['categoria'])) {
            //categoria obtener id y setearlo
            $idCategoria = $categoria->obtenerIdCategoria($publicacion["categoria"]);

            if ($idCategoria != false) {
                $producto->setIdCategoria($idCategoria);
            }
        }


        //imagenes
        $countfiles = count($_FILES["imagen"]["name"]);
        if ($countfiles >= 2 || $countfiles > 10) {
            for ($i = 0; $countfiles > $i; $i++) {
                $arrayImagenes[$i] = $_FILES['imagen']['name'][$i];
            }
        }else{
            $error.=1;
        }

        if($error>0){
            $mensaje="carga incorrecta";
            echo "<script> alert('$mensaje') </script>";
        }else{
            $idProducto = $producto->insertarProducto();
            $this->insertarImagenes($arrayImagenes, $idProducto);
            $this->guardarImagenes($publicacion, $countfiles);
            $this->altaPublicacion($publicacion, $idProducto);
        }
    }

    function insertarImagenes($arrayImagenes, $idProducto)
    {
        foreach ($arrayImagenes as $imagen) {
            $imagenNueva = new Imagen();
            $imagenNueva->setNombre($imagen);
            $imagenNueva->setIdProducto($idProducto);
            $imagenNueva->insertarImagen();
        }
    }

    function guardarImagenes($publicacion, $countfiles)
    {
        for ($i = 0; $countfiles > $i; $i++) {
            $archivo = $_FILES["imagen"]['name'][$i];
            $tmpName = $_FILES['imagen']['tmp_name'][$i];
            var_dump($_FILES);
            // $prefijo = substr(md5(uniqid(rand())),0,6);

            if ($archivo != "") {
                // guardamos el archivo a la carpeta files
                $destino = $publicacion['destino'] . "/" . $archivo;
                copy($tmpName, $destino);
            }
        }
    }

    function altaPublicacion($publicacion, $idProducto)
    {
        $publicar = new Publicacion();

        $validacion = true;
        if (FuncionesComunes::validarCadena($publicacion["titulo"])) {
            $publicar->setTitulo($publicacion["titulo"]);
            $publicar->setTitulo($publicacion["titulo"]);
        } else {
            $validacion = false;
        }
        if (!empty($publicacion["envio"])) {
            $entrega = $publicacion["envio"];
            $entregaPubli = new formaentrega();
            $idEntrega = $entregaPubli->obtenerIdMetodoEntrega($entrega);
        } else {
            $validacion = false;
        }
        if ($validacion) {
            $fecha_actual = date("y-m-d");
            $publicar->setFecha($fecha_actual);
            $publicar->setId_user($_SESSION["idUser"]);
            $publicar->setId_Producto($idProducto);
            $publicacion_Entrega = new Publicacion_Entrega();
            $idPublicacion = $publicar->insertarPublicacion();
            $publicacion_Entrega->setIdPublicacion($idPublicacion);

            for ($i = 0; $i < (count($idEntrega)); $i++) {
                $publicacion_Entrega->setIdEntrega($idEntrega[$i]);
                $publicacion_Entrega->insertarEntrega();
            }

        }
        return $validacion;

    }


}




