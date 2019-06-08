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
        $titulo=$publicacion["titulo"];

        $entrega="";
        if(isset($publicacion["envio"])){
            $entrega=$publicacion["envio"];
        }

        //categoria obtener id y setearlo
        $idCategoria= $categoria->obtenerIdCategoria($publicacion["categoria"]);
        if ($idCategoria != false) {
            $producto->setIdCategoria($idCategoria);
        }


        //imagenes
        $countfiles = count($_FILES["imagen"]["name"]);


        for ($i = 0; $countfiles > $i; $i++) {
           $arrayImagenes[$i] = $_FILES['imagen']['name'][$i];
        }

        echo "arrayImagenes<br>";
        echo "contador".$countfiles;
        var_dump($arrayImagenes);

            //una vez seteados, voy al modelo y valido los formatos
            $resultado1=$producto->validarFormatos() ;
            $resultado2=$this->validarImagenes($arrayImagenes);

         if($resultado1 && $resultado2 ){
                //Insertar Producto en la tabla
                $idProducto = $producto->insertarProducto();
                //guardar imagenes en la base
                $this->tratarImagenes($arrayImagenes, $idProducto);
                $this->altaPublicacion($titulo, $idProducto,$entrega);
            }




    }




   function validarImagenes($array){

        $error = 0;
        $mensaje = "";
        if (count($array) < 2) {
            $error.=1;
            $mensaje .= "Seleccione dos o mas imagenes";
        }

        if (count($array) > 10) {
            $error.=1;
            $mensaje .= "Limite de imagenes superado";
        }
        if ($error > 0) {
            echo "<script> alert('$mensaje') </script>";
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

    function altaPublicacion($titulo,$idProducto,$entrega)

    {
        //obtener id de metodo de entrega

        $publicar=new Publicacion();
        $publicar->setTitulo($titulo);
        $fecha_actual = date("y-m-d");
        $publicar->setFecha($fecha_actual);
        $publicar->setId_user($_SESSION["idUser"]);
        $publicar->setId_Producto($idProducto);

        if($publicar->validarFormatos($entrega)) {
            $idPublicacion = $publicar->insertarPublicacion();
            $Entrega=new formaentrega();
            $publicacion_Entrega =new Publicacion_Entrega();

            $idEntrega=$Entrega->obtenerIdMetodoEntrega($entrega);

            $publicacion_Entrega->setIdPublicacion($idPublicacion);

            if(count($idEntrega)>1){
                $publicacion_Entrega->setIdEntrega($idEntrega[0]);
                $publicacion_Entrega->insertarEntrega();
                $publicacion_Entrega->setIdEntrega($idEntrega[1]);
                $publicacion_Entrega->insertarEntrega();
            }else{
                $publicacion_Entrega->setIdEntrega($idEntrega[0]);
                $publicacion_Entrega->insertarEntrega();
            }

        }

    }




}




