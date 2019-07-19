<?php
class MisPublicacionesController extends Controller
{
    function publicaciones()
    {

        $d["title"] = "Index";
        $d["nombreUsuario"]= $_SESSION["name"];
        $estados=[];
        $publicaciones=new Publicacion();
        $estado=new Estado();
        $arrayProductoDePublicaciones=[];
        $productos=new Producto();
        $imagen =new Imagen();
        $imagenes=[];

        $misPublicaciones=$publicaciones->traePublicaionesPorIdUser($_SESSION["logueado"]);
        foreach($misPublicaciones as $p){
            $estadoPublicacion=$estado->traerEstado($p["id_Estado"]);
            array_push($estados,$estadoPublicacion);
        }

         for($i=0 ;$i<count( $misPublicaciones);$i++){
             $pk=$misPublicaciones[$i]["id_Producto"];
             $misImagenes = $imagen->primerImagenPorPk($pk);
             $productoDePublicacion=$productos->filasPorPk($pk);
             array_push($imagenes, $misImagenes[0]);
             array_push($arrayProductoDePublicaciones, $productoDePublicacion);
         }
        $d["imagen"] =  $imagenes;
        $d["publicaciones"] =  $misPublicaciones;
        $d["estados"] =  $estados;
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
     header("Location:" .getBaseAddress().'Mispublicaciones/publicaciones');

 }

    function publicacionInactiva($datos){
        $publicacion=new Publicacion();
        $PublicacionBase=$publicacion->traePublicaionPorId($datos["idPublicacion"]);

        $publicacionAmodificar=new Publicacion();
        $publicacionAmodificar->setId($PublicacionBase[0]["id"]);
        $publicacionAmodificar->InactivarPublicacion();
        header("Location:" .getBaseAddress().'Mispublicaciones/publicaciones');

    }

}