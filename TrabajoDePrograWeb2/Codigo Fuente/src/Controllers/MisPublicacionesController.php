<?php
class MisPublicacionesController extends Controller
{
    function publicaciones()
    {

        $d["title"] = "Index";

        $publicaciones=new Publicacion();
        $misPublicaciones=$publicaciones->traePublicaionesPorIdUser($_SESSION["logueado"]);

        $d["publicaciones"] =  $misPublicaciones;
         $arrayProductoDePublicaciones=[];
        $productos=new Producto();
         for($i=0 ;$i<count( $misPublicaciones);$i++){
             $pk=$misPublicaciones[$i]["id_Producto"];
             $productoDePublicacion=$productos->filasPorPk($pk);
             array_push($arrayProductoDePublicaciones, $productoDePublicacion);
         }


        //guarda un valor nulo en la posicion 21
        // var_dump($arrayProductoDePublicaciones);

        $d["productos"] =  $arrayProductoDePublicaciones;
        $this->set($d);

        $this->render(Constantes::PUBLICACIONESVIEW);

    }

      function verPublicacionesComoAdmin($datos){
          $d["title"] = "Index";

          $publicaciones=new Publicacion();
          $misPublicaciones=$publicaciones->traePublicaionesPorIdUser($datos["id_user"]);

          $d["publicaciones"] =  $misPublicaciones;
          $arrayProductoDePublicaciones=[];
          $productos=new Producto();
          for($i=0 ;$i<count( $misPublicaciones);$i++){
              $pk=$misPublicaciones[$i]["id_Producto"];
              $productoDePublicacion=$productos->filasPorPk($pk);
              array_push($arrayProductoDePublicaciones, $productoDePublicacion);
          }


          //guarda un valor nulo en la posicion 21
          // var_dump($arrayProductoDePublicaciones);

          $d["productos"] =  $arrayProductoDePublicaciones;
          $this->set($d);

          $this->render(Constantes::PUBLICACIONESVIEW);
}


}