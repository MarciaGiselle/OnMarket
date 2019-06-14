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


    function altaProducto($publicacion){

        $producto = new Producto();
        $categoria = new Categoria();
        //conceptos generales
        if (FuncionesComunes::validarCadena($publicacion["nombre"])) {
            $producto->setNombre($publicacion["nombre"]);
        }

        if (FuncionesComunes::validarCadenaNumerosYEspacios($publicacion["descripcion"])) {
            $producto->setDescripcion($publicacion["descripcion"]);
        }
        if (FuncionesComunes::validarNumeros($publicacion["cantidad"])) {
            $producto->setCantidad($publicacion["cantidad"]);
        }
       if (FuncionesComunes::validarNumeros($publicacion["precio"])) {
            $producto->setPrecio($publicacion["precio"]);
        }
        if (!empty($publicacion["categoria"]) && FuncionesComunes::validarCadena($publicacion['categoria'])) {
            //categoria obtener id y setearlo
            $idCategoria = $categoria->obtenerIdCategoria($publicacion["categoria"]);

            if ($idCategoria != false) {
                $producto->setIdCategoria($idCategoria);
            }
        }


        else {
            throw new PublicacionCamposInvalidosException("Alguno de los campos completados no poseen un formato válido", CodigoError::PublicacionInvalida);
        }

        var_dump($producto);
        //imagenes
        $countfiles = count($_FILES["imagen"]["name"]);
        if($countfiles>2 || $countfiles>10){
        for ($i = 0; $countfiles > $i; $i++) {
            $arrayImagenes[$i] = $_FILES['imagen']['name'][$i];
        }

        $idProducto = $producto->insertarProducto();
        $this->insertarImagenes($arrayImagenes, $idProducto);
        $this->guardarImagenes($publicacion, $countfiles);

        }
        else{
            throw new PublicacionCamposInvalidosException("Alguno de los campos completados no poseen un formato válido", CodigoError::PublicacionInvalida);

        }

        if(! ($this->altaPublicacion($publicacion, $idProducto))){
            //cambiar!
            throw new PublicacionCamposInvalidosException("Alguno de los campos completados no poseen un formato válido", CodigoError::PublicacionInvalida);

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

                if (copy($tmpName, $destino)) {
                    return true;
                }
            }
        }
    }

    function altaPublicacion($publicacion, $idProducto){
        $publicar = new Publicacion();

        $validacion=true;
        if (FuncionesComunes::validarCadena($publicacion["titulo"])) {
            $publicar->setTitulo($publicacion["titulo"]);
            $publicar->setTitulo($publicacion["titulo"]);
        }else{
            $validacion=false;
        }
        if(!empty($publicacion["envio"])) {
            $entrega =$publicacion["envio"];
            $entregaPubli = new formaentrega();
            $idEntrega = $entregaPubli->obtenerIdMetodoEntrega($entrega);
        }else{
            $validacion=false;
        }
        if($validacion){
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




