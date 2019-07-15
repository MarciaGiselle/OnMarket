<?php


class EliminarController extends Controller
{
  function eliminarPublicacion($datos){
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
      $d["imagenes"] =  $imagenesAmostrar;
      $d["categoria"] =  $categoriaAmostrar;

      $this->set($d);
      $this->render(Constantes::ELIMINARPUBLICACIONESVIEW);


  }

function confirmarEliminacion($datos){
    $producto = new Producto();
    $publicacion=new Publicacion();
    $idProducto=$datos["idProducto"];
    $idPublicacion=$datos["idPublicacion"];

  $producto->eliminar($idProducto);
    $publicacion->eliminar($idPublicacion);
echo "se elimino c:";
   // $this->render(Constantes::PUBLICACIONESVIEW);
}
}