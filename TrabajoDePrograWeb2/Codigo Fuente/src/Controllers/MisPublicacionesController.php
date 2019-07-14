<?php
class MisPublicacionesController extends Controller
{
    function publicaciones()
    {

        $d["title"] = "Index";

        $publicaciones=new Publicacion();

        $misPublicaciones=$publicaciones->traePublicaionesPorIdUser($_SESSION["logueado"]);

        $d["publicaciones"] =  $misPublicaciones;

        $estados=[];
        $estado=new Estado();
        foreach($misPublicaciones as $p){
            $estadoPublicacion=$estado->traerEstado($p["id_Estado"]);
            array_push($estados,$estadoPublicacion);
        }
        $d["estados"] =  $estados;

         $arrayProductoDePublicaciones=[];
        $productos=new Producto();
         for($i=0 ;$i<count( $misPublicaciones);$i++){
             $pk=$misPublicaciones[$i]["id_Producto"];
             $productoDePublicacion=$productos->filasPorPk($pk);
             array_push($arrayProductoDePublicaciones, $productoDePublicacion);
         }



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

 function publicacionActiva($datos){
      $publicacion=new Publicacion();
     $PublicacionBase=$publicacion->traePublicaionPorId($datos["idPublicacion"]);

     $publicacionAmodificar=new Publicacion();
     $publicacionAmodificar->setId($PublicacionBase[0]["id"]);
     $publicacionAmodificar->ActivarPublicacion();
}

    function publicacionInactiva($datos){
        $publicacion=new Publicacion();
        $PublicacionBase=$publicacion->traePublicaionPorId($datos["idPublicacion"]);

        $publicacionAmodificar=new Publicacion();
        $publicacionAmodificar->setId($PublicacionBase[0]["id"]);
        $publicacionAmodificar->InactivarPublicacion();
    }

}