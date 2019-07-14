<?php


class ModificarController extends Controller
{
    function modificar($datos){
        $d["nombreUsuario"]= $_SESSION["name"];
        $d["title"] = "Index";
        $producto=new Producto();
        $publicacion =new Publicacion();
        $categoria=new Categoria();
        $imagenes=new Imagen();

        $productoAmostrar=$producto->buscarUnProductoPorPk($datos["idProducto"]);
        $publicacionAmostrar=$publicacion->traePublicaionPorId($datos["idPublicacion"]);
        $categoriaAmostrar=$categoria->obtenerValorDeGategoria($productoAmostrar["idCategoria"]);
        $imagenesAmostrar= $imagenes->imagenPk($productoAmostrar["id"]);

        $d["publicacion"] =  $publicacionAmostrar;
        $d["producto"] =  $productoAmostrar;
        $d["imagen"] =  $imagenesAmostrar;
        $d["categoria"] =  $categoriaAmostrar;
        
        $this->set($d);
        $this->render(Constantes::MODIFICARPUBLICACIONESVIEW);


    }

    function realizarCambios($datos){
        $producto = new Producto();
        $categoria = new Categoria();


        $producto->setId($datos["idProducto"]);

        $mensaje="";
        $error=0;
        $error2=0;
        //conceptos generales
        if (FuncionesComunes::validarCadena($datos["nombre"])) {
            $producto->setNombre($datos["nombre"]);
        }else{
            $mensaje.="nombre invalido,";
            $error.=1;
        }
        if (FuncionesComunes::validarCadenaNumerosYEspacios($datos["descripcion"])) {
              $producto->setDescripcion($datos["descripcion"]);
        }else{
            $mensaje.="descripcion invalido,";
            $error.=1;
        }
        if (FuncionesComunes::validarNumeros($datos["cantidad"])) {
          $producto->setCantidad($datos["cantidad"]);
        }else{
            $mensaje.="cantidad invalido,";
            $error.=1;
        }
        if (FuncionesComunes::validarNumeros($datos["precio"])) {
          $producto->setPrecio($datos["precio"]);
        }else{
            $mensaje.="precio invalido,";
            $error.=1;
        }
        
        if($error>0){
            echo "<script> alert($mensaje)</script>";

        }

        if (!empty($datos["categoria"]) && FuncionesComunes::validarCadena($datos['categoria'])) {
            //categoria obtener id y setearlo
            $idCategoria = $categoria->obtenerIdCategoria($datos["categoria"]);

            if ($idCategoria != false) {
                $producto->setIdCategoria($idCategoria);
            }

            $producto->ModificarProducto();
            $this->modificarPublicacion($datos, $datos["idProducto"]);

            //PARTE DE LAS IMAGENES

            if(!empty($_FILES["imagen"]["name"])){

                $countfiles = count($_FILES["imagen"]["name"]);
                if ($countfiles >= 2 || $countfiles > 10) {
                    for ($i = 0; $countfiles > $i; $i++) {
                        $arrayImagenes[$i] = $_FILES['imagen']['name'][$i];
                    }
                }else{
                    $error2.=1;
                }

                if($error2>0){
                    $mensaje="carga incorrecta";
                    echo "<script> alert('$mensaje') </script>";
                }else{

                    $this->actualizarImagenes($arrayImagenes, $idProducto);
                   $this->guardarImagenes($datos, $countfiles);

                }



            }

        }




    }

    function modificarPublicacion($datos, $idProducto)
    {
        $publicar = new Publicacion();

        $validacion = true;
        if (FuncionesComunes::validarCadena($datos["titulo"])) {
            $publicar->setTitulo($datos["titulo"]);

        } else {
            $validacion = false;
        }
      /*  if (!empty($publicacion["envio"])) {
            $entrega = $publicacion["envio"];
            $entregaPubli = new formaentrega();
           // $idEntrega = $entregaPubli->obtenerIdMetodoEntrega($entrega);
        } else {
            $validacion = false;
        }*/
        if ($validacion) {
            $fecha_actual = date("y-m-d");
            $publicar->setFecha($fecha_actual);
            $publicacion_Entrega = new Publicacion_Entrega();
            $publicar->setId($datos["idPublicacion"]);
            $idPublicacion = $publicar->modificarPublicacion();
            //$publicacion_Entrega->setIdPublicacion($idPublicacion);

          //  for ($i = 0; $i < (count($idEntrega)); $i++) {
            //    $publicacion_Entrega->setIdEntrega($idEntrega[$i]);
             //   $publicacion_Entrega->insertarEntrega();
       //     }

        }
        return $validacion;

    }


    function actualizarImagenes($arrayImagenes, $idProducto)
    {
        $imagen =new Imagen();
    //trae un array con imagenes del prod
        $arrayImg= $imagen->imagenPk($idProducto);
         $nuevas=count($arrayImagenes);
         $viejas=count($arrayImg);
         $diferencia=0;

         if($nuevas>$viejas){
             $diferencia=$nuevas-$viejas;

             //se insertan las nuevas
             for($i=0;$i< $diferencia;$i++) {
                  $imagenNueva = new Imagen();
                 $imagenNueva->setNombre($arrayImagenes[$i]);
                 $imagenNueva->setIdProducto($idProducto);
                 $imagenNueva->insertarImagen();

             }
          }else{
             $diferencia=$viejas-$nuevas;
             //se eliminan las viejas

             for($i=0;$i< $diferencia;$i++) {
                 $imagenNueva = new Imagen();
                 $imagenNueva->setId($arrayImg[$i]["id"]);
                 $imagenNueva->eliminarImagen();

             }
         }

        $tope=$viejas-$diferencia;
         echo $viejas;
         echo $diferencia;
         echo $tope;
        for($i=$diferencia;$i<$tope;$i++) {

            $imagenNueva = new Imagen();

            $imagenNueva->setId($arrayImg[$i]["id"]);
            $imagenNueva->setNombre($arrayImagenes[$i]);
            $imagenNueva->setIdProducto($idProducto);
            $imagenNueva->actualizarImagen();

        }
    }

    function guardarImagenes($publicacion, $countfiles)
    { $img =new Imagen();
        for ($i = 0; $countfiles > $i; $i++) {
            $archivo = $_FILES["imagen"]['name'][$i];
            $tmpName = $_FILES['imagen']['tmp_name'][$i];

            // $prefijo = substr(md5(uniqid(rand())),0,6);
            $guardar=$img->cambiarTamaño($tmpName);
            // $prefijo = substr(md5(uniqid(rand())),0,6);

            if ($archivo != "") {
                // guardamos el archivo a la carpeta files
                $destino = $publicacion['destino'] . "/" . $archivo;
                imagejpeg($guardar, $destino);
            }
        }
    }



}