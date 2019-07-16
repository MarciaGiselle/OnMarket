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
        $d["nombreUsuario"]= $_SESSION["name"];
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
        echo $publicacion["categoria"];

        if ($publicacion["categoria"] !== 0) {
            //categoria obtener id y setearlo
            $idCategoria = $categoria->obtenerIdCategoria($publicacion["categoria"]);
            if ($idCategoria != false) {
                $producto->setIdCategoria($idCategoria);
            }
        }else{
            $error.=1;

        }

        $error2 = 0;
        //imagenes

        $countfiles = count($_FILES["imagen"]["name"]);

        if ($countfiles >= 2 || $countfiles < 10) {

            for ($i = 0; $countfiles > $i; $i++) {
                $arrayImagenes[$i] = $_FILES['imagen']['name'][$i];

            }

        }else{

            $error2.=1;

        }



        if($error2>0){

            $mensaje="Carga incorrecta";

            echo "<script> alert('$mensaje') </script>";
            header("Location:" .getBaseAddress().'Producto/publicar');


        }
        if($error>0) {
        $mensaje="Error. Debe seleccionar al menos dos imágenes";

        echo "<script> alert('$mensaje') </script>";

        }

        if($error==0 && $error2 ==0){

            $idProducto = $producto->insertarProducto();

            $this->insertarImagenes($arrayImagenes, $idProducto);

            $this->guardarImagenes($publicacion, $countfiles);

            $this->altaPublicacion($publicacion, $idProducto);
           header('Location:'.getBaseAddress().'MisPublicaciones/publicaciones');
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

            $publicar->setId_user($_SESSION["logueado"]);

            $publicar->setId_Producto($idProducto);

            $publicacion_Entrega = new Publicacion_Entrega();

            $idPublicacion = $publicar->insertarPublicacion();
            echo  $idPublicacion;

            $publicacion_Entrega->setIdPublicacion($idPublicacion);



          for ($i = 0; $i < (count($idEntrega)); $i++) {

               $publicacion_Entrega->setIdEntrega((int)$idEntrega[$i]);

                $publicacion_Entrega->insertarEntrega();

            }



        }

        return $validacion;



    }





}





