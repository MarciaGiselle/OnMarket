<?php


class PreguntasController extends Controller
{
    function preguntas()
    {

        $d["title"] = "Preguntas";
        $d["nombreUsuario"]= $_SESSION["name"];

        $comentario = new Comentario();
        // el id_user porq el q esta logueado
        $publicaciones=new Publicacion();
        $misPublicaciones=$publicaciones->traePublicaionesPorIdUser($_SESSION["logueado"]);
        $resultadosFinal = [];
        $publicacionesConComentariops = [];
        foreach($misPublicaciones as $publicacion) {

            $comentarios = $comentario->traerComentariosPorPublicacion($publicacion["id"]);
            $respuestas = [];
            $resultados = [];
            for ($i = 0; $i < count($comentarios); $i++) {
                if (!empty($comentarios[$i]["id_comentario2"])) {

                    $respuesta = $comentario->traerComentariosPorPK($comentarios[$i]["id_comentario2"]);
                    array_push($respuestas, $respuesta);
                }

            }

            for ($i = 0; $i < count($comentarios); $i++) {


                if (!in_array($comentarios[$i],$respuestas)){
                    if(!empty($comentarios[$i]["id_comentario2"])) {
                        $respuesta = $comentario->traerComentariosPorPK($comentarios[$i]["id_comentario2"]);
                        $array = [
                            "comentario" => $comentarios[$i],
                            "respuesta" => $respuesta,
                        ];

                    }else{
                        $array = [
                            "comentario" => $comentarios[$i],
                            "respuesta" => null,
                        ];
                    }

                    array_push($resultados, $array);
                }
            }


            array_push($publicacionesConComentariops,$publicacion);
            array_push($resultadosFinal , $resultados);
        }
        $d["resultados"] =$resultadosFinal;
        $d["publicaciones"] =$publicacionesConComentariops;
        $this->set($d);

        $this->render(Constantes::PREGUNTASVIEW);

    }
}