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
 //FALTA VALIDAR METODO DE ENTREGA VACIO
        $producto = new Producto();
        $categoria = new Categoria();
        $error=0;
        $mensaje="";
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
            }else{
                $error++;
                $mensaje.="Debe seleccionar una categoria ,";


            }
        }


        //imagenes
        $countfiles = count($_FILES["imagen"]["name"]);
        if ($countfiles >= 2 || $countfiles > 10) {
            for ($i = 0; $countfiles > $i; $i++) {
                $arrayImagenes[$i] = $_FILES['imagen']['name'][$i];
            }
        }else{
            $error++;
        }

        if($error>0){
            $mensaje.="El minimo de imagenes son dos y el maximo 10 , porfavor cargue una cantidad aceptable gracias";
            echo "<script> alert('$mensaje') </script>";
            $this->publicar();
        }else{

            $idProducto = $producto->insertarProducto();
            $this->altaPublicacion($publicacion, $idProducto);
            $this->insertarImagenes($arrayImagenes, $idProducto);
            $this->guardarImagenes($publicacion, $countfiles);


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
    { $img=new Imagen();
        for ($i = 0; $countfiles > $i; $i++) {
            $archivo = $_FILES["imagen"]['name'][$i];
            var_dump($archivo);
            $tmpName = $_FILES['imagen']['tmp_name'][$i];

            $guardar=$img->cambiarTamaño($tmpName);
            // $prefijo = substr(md5(uniqid(rand())),0,6);

            if ($archivo != "") {
                // guardamos el archivo a la carpeta files
                $destino = $publicacion['destino'] . "/" . $archivo;
                imagejpeg($guardar, $destino);

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
                 //SOLO PARA QUE REDICRECCIONE
                $d["title"] = "Publicar";
                $this->set($d);
                $this->render(Constantes::PUBLICARVIEW);
            }

        }
        return $validacion;

    }


}




