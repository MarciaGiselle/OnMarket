<?php


class ModificarController extends Controller
{
    function modificar($datos){
        $d["title"] = "Index";
        $producto=new Producto();
        $publicacion =new Publicacion();
        $categoria=new Categoria();
        $imagenes=new Imagen();

        $productoAmostrar=$producto->buscarUnProductoPorPk($datos["idProducto"]);
        $publicacionAmostrar=$publicacion->traePublicaionPorId($datos["idPublicacion"]);
        $categoriaAmostrar=$categoria->obtenerValorDeGategoria($productoAmostrar["idCategoria"]);
        $imagenesAmostrar= $imagenes->imagenPk($productoAmostrar["idProducto"]);

        $d["publicacion"] =  $publicacionAmostrar;
        $d["producto"] =  $productoAmostrar;
        $d["imagenes"] =  $imagenesAmostrar;
        $d["categoria"] =  $categoriaAmostrar;
        $this->set($d);

        $this->render(Constantes::MODIFICARPUBLICACIONESVIEW);


    }

    function realizarCambios($datos){
        $producto = new Producto();
        $categoria = new Categoria();
        $obtenerProducto=$producto->buscarUnProductoPorPk($datos["id"]);
        $idProducto=$obtenerProducto["idProducto"];

        $producto->setIdProducto( $idProducto);
        $error=0;
        //conceptos generales
        if (FuncionesComunes::validarCadena($datos["nombre"])) {
            $producto->setNombre($datos["nombre"]);
        }else{
            $error.=1;
        }
        if (FuncionesComunes::validarCadenaNumerosYEspacios($datos["descripcion"])) {
              $producto->setDescripcion($datos["descripcion"]);
        }else{
            $error.=1;
        }
        if (FuncionesComunes::validarNumeros($datos["cantidad"])) {
          $producto->setCantidad($datos["cantidad"]);
        }else{
            $error.=1;
        }
        if (FuncionesComunes::validarNumeros($datos["precio"])) {
          $producto->setPrecio($datos["precio"]);
        }else{
            $error.=1;
        }
        if (!empty($datos["categoria"]) && FuncionesComunes::validarCadena($datos['categoria'])) {
            //categoria obtener id y setearlo
            $idCategoria = $categoria->obtenerIdCategoria($datos["categoria"]);

            if ($idCategoria != false) {
                $producto->setIdCategoria($idCategoria);
            }
        }


        //imagenes
        /*$countfiles = count($_FILES["imagen"]["name"]);
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
        }else{*/
         var_dump($producto);
            $idProducto = $producto->ModificarProducto();
           // $this->insertarImagenes($arrayImagenes, $idProducto);
           // $this->guardarImagenes($publicacion, $countfiles);
           $this->modificarPublicacion($datos, $idProducto);
        /*}*/
    }

    /* function insertarImagenes($arrayImagenes, $idProducto)
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
     }*/
    function modificarPublicacion($datos, $idProducto)
    {
        $publicar = new Publicacion();

        $validacion = true;
        if (FuncionesComunes::validarCadena($datos["titulo"])) {
            $publicar->setTitulo($datos["titulo"]);

        } else {
            $validacion = false;
        }
        if (!empty($publicacion["envio"])) {
            $entrega = $publicacion["envio"];
            $entregaPubli = new formaentrega();
           // $idEntrega = $entregaPubli->obtenerIdMetodoEntrega($entrega);
        } else {
            $validacion = false;
        }
        if ($validacion) {
            $fecha_actual = date("y-m-d");
            $publicar->setFecha($fecha_actual);
            $publicar->setId_user($_SESSION["idUser"]);
            $publicar->setId_Producto($idProducto);
            $publicacion_Entrega = new Publicacion_Entrega();
            $idPublicacion = $publicar->modificarPublicacion();
            $publicacion_Entrega->setIdPublicacion($idPublicacion);

          //  for ($i = 0; $i < (count($idEntrega)); $i++) {
            //    $publicacion_Entrega->setIdEntrega($idEntrega[$i]);
             //   $publicacion_Entrega->insertarEntrega();
       //     }

        }
        return $validacion;

    }

}