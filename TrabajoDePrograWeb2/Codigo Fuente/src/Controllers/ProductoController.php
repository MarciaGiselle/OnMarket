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

        header("Content-type: application/json");
        $data = json_decode(utf8_decode($publicacion['data']));

        $producto = new Producto();
        $categoria = new Categoria();

        //conceptos generales
        if (FuncionesComunes::validarCadena($data->nombre)) {
            $producto->setNombre($publicacion["nombre"]);
        }

        else if (FuncionesComunes::validarCadena($data->descripcion)) {
            $producto->setDescripcion($publicacion["descripcion"]);
        }

        else if (FuncionesComunes::validarNumeros($data->cantidad)) {
            $producto->setCantidad($publicacion["cantidad"]);
        }
        else if (FuncionesComunes::validarNumeros($data->precio)) {
            $producto->setPrecio($publicacion["precio"]);
        }
        else if (!empty($data->categoria)) {
            //categoria obtener id y setearlo
            $idCategoria = $categoria->obtenerIdCategoria($publicacion["categoria"]);
            if ($idCategoria != false) {
                $producto->setIdCategoria($idCategoria);
            }
        }
        else if (!empty($data->envio)) {
            $entrega = $data->envio;
        }
        else {
            throw new PublicacionCamposInvalidosException("Alguno de los campos completados no poseen un formato válido", CodigoError::PublicacionInvalida);
        }

        //imagenes
        $countfiles = count($_FILES["imagen"]["name"]);
        if($countfiles>2 || $countfiles>10){
        for ($i = 0; $countfiles > $i; $i++) {
            $arrayImagenes[$i] = $_FILES['imagen']['name'][$i];
        }

            $idProducto = $producto->insertarProducto();
            $this->insertarImagenes($arrayImagenes, $idProducto);
            $this->guardarImagenes($publicacion, $countfiles);
            $this->altaPublicacion($publicacion, $idProducto, $entrega);
        }
        else{
            throw new PublicacionCamposInvalidosException("Alguno de los campos completados no poseen un formato válido", CodigoError::PublicacionInvalida);

        }

        echo json_encode(true);
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

    function altaPublicacion($publicacion, $idProducto, $entrega)

    {
        $publicar = new Publicacion();

        $publicar->setTitulo($publicacion["titulo"]);
        $fecha_actual = date("y-m-d");
        $publicar->setFecha($fecha_actual);
        $publicar->setId_user($_SESSION["idUser"]);
        $publicar->setId_Producto($idProducto);

        if ($publicar->validarFormatos($entrega)) {
            $idPublicacion = $publicar->insertarPublicacion();
            $entregaPubli = new formaentrega();
            $publicacion_Entrega = new Publicacion_Entrega();
            $idEntrega = $entregaPubli->obtenerIdMetodoEntrega($entrega);
            $publicacion_Entrega->setIdPublicacion($idPublicacion);

            for ($i = 0; $i < (count($idEntrega)); $i++) {
                $publicacion_Entrega->setIdEntrega($idEntrega[$i]);
                $publicacion_Entrega->insertarEntrega();
            }

        }


    }
}




