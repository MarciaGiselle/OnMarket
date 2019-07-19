<?php


class PublicacionesAdminController extends Controller
{
    function verPublicaciones($datos){
        $d["title"] = "Publicaciones";
        $d["nombreUsuario"]= $_SESSION["name"];
        $publicaciones=new Publicacion();
        $estadoP= new Estado();
        $misPublicaciones=$publicaciones->traePublicaionesPorIdUser($datos["id_user"]);
        $d["publicaciones"] =  $misPublicaciones;
        $arrayProductoDePublicaciones=[];
        $estados=[];
        $productos=new Producto();

        for($i=0 ;$i<count( $misPublicaciones);$i++){
            $estado = $estadoP->traerEstado($misPublicaciones[$i]["id_Estado"]);
            $pk=$misPublicaciones[$i]["id_Producto"];
            $productoDePublicacion=$productos->filasPorPk($pk);

            array_push($estados, $estado);
            array_push($arrayProductoDePublicaciones, $productoDePublicacion);
        }

        $d["estados"]= $estados;
        $d["productos"] =  $arrayProductoDePublicaciones;

        $this->set($d);
        $this->render(Constantes::PUBLICACIONESADMINVIEW);
    }

}