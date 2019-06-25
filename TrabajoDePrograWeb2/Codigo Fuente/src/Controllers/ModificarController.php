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


        $producto->setIdProducto($datos["idProducto"]);

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
        echo "id: ".$producto->getIdProducto()."<br>nombre:".$producto->getNombre()."<br>";
            $sql=$producto->ModificarProducto();
if ($sql != false){
    echo "cambios realizados";
}
        //$this->modificarPublicacion($datos, $idProducto);

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