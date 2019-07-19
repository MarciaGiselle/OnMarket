<?php
/**
 * Created by PhpStorm.
 * User: Globons
 * Date: 11/5/2019
 * Time: 11:41
 */

class MostrarProductoController extends Controller
{
    function verProducto($datos)
    {
        $id = $datos["id"];
        if(isset($_SESSION["logueado"])){
            $d["nombreUsuario"]= $_SESSION["name"];
        }
        $producto = new Producto();
        $prodEncontrado = $producto->buscarUnProductoPorPk($id);

        $d["resultado"] = $prodEncontrado;
        $d["title"] = $prodEncontrado["nombre"];


        $publicacion = new Publicacion();
        $publicacionDelProducto = $publicacion->traerPublicaciondelProducto($id);
        $idUser = $publicacionDelProducto["id_user"];

        $localizacion = new Localizacion();
        $localizacionDelUser = $localizacion->traerLocalizacionPorIdUser($idUser);

        $lat = $localizacionDelUser[0]["latitud"];
        $lon = $localizacionDelUser[0]["longitud"];

        $imagen = new Imagen();
        $d["imagen"] = $imagen->imagenPk($id);
        $nombre = explode(" ", $prodEncontrado["nombre"]);
        $d["productosRelacionados"] = ($this->mostrarProductosRelacionados($nombre[0], $id));
        $d["lat"] = $lat;
        $d["lon"] = $lon;

        $entregaPublicacion = new Publicacion_Entrega();
        $entrega = new FormaEntrega();
        $arrayEntrega = [];
        $arrayEntregaIds = $entregaPublicacion->traerEntrgaPorPublicacion($publicacionDelProducto["id"]);

        foreach ($arrayEntregaIds as $entregaid) {
            $registro = $entrega->traerEntrega($entregaid["idEntrega"]);
            array_push($arrayEntrega, $registro);
        }


        $d["entrega"] = $arrayEntrega;

        $usuario = new Usuario();
        $valoracion = new tipo_valoracion();
        $vendedor = $usuario->traerUserPorPk($idUser);
        $nombreValoracion = $valoracion->traerNombrePorId($vendedor['idTipo']);
        $d["tipoVendedor"] = [$nombreValoracion, $vendedor["idTipo"]];
        $d["nombreVendedor"] = [$vendedor["name"], $vendedor["lastname"]];

        $d["idVendedor"] = $publicacionDelProducto["id_user"];

//comentarios

        $comentario = new Comentario();
        $comentarios = $this->mostrarComentarios($publicacionDelProducto["id"]);
        $respuestas = [];
        $resultados = [];
        for ($i = 0; $i < count($comentarios); $i++) {
            if (!empty($comentarios[$i]["id_comentario2"])) {

                $respuesta = $comentario->traerComentariosPorPK($comentarios[$i]["id_comentario2"]);
                array_push($respuestas, $respuesta);
            }

        }

        $user=new Usuario();
        for ($i = 0; $i < count($comentarios); $i++) {


                    if (!in_array($comentarios[$i],$respuestas)){
                      if(!empty($comentarios[$i]["id_comentario2"])) {
                          $respuesta = $comentario->traerComentariosPorPK($comentarios[$i]["id_comentario2"]);
                          $usuarioDelComentario=$user->traerUserPorPk($comentarios[$i]["id_Usuario"]);
                          $array = [
                              "comentario" => $comentarios[$i],
                              "respuesta" => $respuesta,
                              "usuario" => $usuarioDelComentario,
                          ];

                    }else{
                          $usuarioDelComentario=$user->traerUserPorPk($comentarios[$i]["id_Usuario"]);
                          $array = [
                              "comentario" => $comentarios[$i],
                              "respuesta" => null,
                              "usuario" => $usuarioDelComentario,
                          ];
                      }

                        array_push($resultados, $array);
                    }
                }





        $d["resultados"] =$resultados;
        $this->set($d);
        $this->render(Constantes::MOSTRARVIEW);

    }


    function AgregarComentario($datosComentario){
        header("Content-type: application/json");
        $datos = json_decode(utf8_decode($datosComentario['data']));

        $mensaje=$datos->mensaje;
        $idVendedor=$datos->idVendedor;
        $idComentario=$datos->idComentario;
        $publicacion=new Publicacion();
        $publicacionDelProd=$publicacion->traerPublicaciondelProducto($datos->idProducto);
        $idPublicacion= $publicacionDelProd['id'];



        $publicacion=new Publicacion();
        $publicacionDelProd=$publicacion->traerPublicaciondelProducto($datos->idProducto);
        $idPublicacion= $publicacionDelProd['id'];

        $comentario=new Comentario();

        $comentario->setIdPublicacion($idPublicacion);
        $comentario->setIdUsuario( $_SESSION["logueado"]);
        $comentario->setMensaje($mensaje);

        $fecha=date('Y-m-d H:i:s ');

        $comentario->setFecha($fecha);
       $idNuevoComentario= $comentario->insertarComentario();

        if($idComentario!=null) {
            //traer el comentario
            $comentario2 = new Comentario();

            $comentarioExistente = $comentario->traerComentariosPorPK($idComentario);
            $comentario2->setId($comentarioExistente["id"]);
            //setearle en id comentario 2 el nuevo comentario
            $comentario2->setIdComentario2($idNuevoComentario);
            $comentario2->actualizarComentario();

        }
  ////////////////////////////////////////////////////////////////////
        $comentario = new Comentario();
        $comentarios = $this->mostrarComentarios($idPublicacion);
        $respuestas = [];
        $resultados = [];
        $user=new Usuario();
        for ($i = 0; $i < count($comentarios); $i++) {


            if (!in_array($comentarios[$i],$respuestas)){
                if(!empty($comentarios[$i]["id_comentario2"])) {
                    $respuesta = $comentario->traerComentariosPorPK($comentarios[$i]["id_comentario2"]);
                    $usuarioDelComentario=$user->traerUserPorPk($comentarios[$i]["id_Usuario"]);
                    $array = [
                        "comentario" => $comentarios[$i],
                        "respuesta" => $respuesta,
                        "usuario" => $usuarioDelComentario,
                    ];

                }else{
                    $usuarioDelComentario=$user->traerUserPorPk($comentarios[$i]["id_Usuario"]);
                    $array = [
                        "comentario" => $comentarios[$i],
                        "respuesta" => null,
                        "usuario" => $usuarioDelComentario,
                    ];
                }

                array_push($resultados, $array);
            }
        }




        echo json_encode($resultados);

    }
    function mostrarComentarios($id_Publicacion){
         $comentario=new Comentario();
         $comentarios=$comentario->traerComentariosPorPublicacion($id_Publicacion);
         return $comentarios ;
    }

    function mostrarProductosRelacionados($nombre, $id)
    {


        $productoABuscar = new Producto();
        $imagenABuscar = new Imagen();

        $productoABuscar->setNombre($nombre);

        $idsProductos = $productoABuscar->buscarProductoEnLaBase();

        if (empty($idsProductos)) {
            echo "no hay productos relacionados";
        } else {

            $productosEncontrados = [];
            $imagenesEncontradas = [];

            foreach ($idsProductos as $pk) {
                array_push($productosEncontrados, $productoABuscar->filasPorPk($pk));
                array_push($imagenesEncontradas, $imagenABuscar->primerImagenPorPk($pk));
            }

            $arrayProductoImagen = [];


            for ($i = 0; $i < count($idsProductos); $i++) {
                $producto = $productosEncontrados[$i];
                $imagen = $imagenesEncontradas[$i];

                if ($producto[0]["id"] !== $id) {
                    $arrayProducto = [
                        "prod" => $producto,
                        "imagen" => $imagen];

                    array_push($arrayProductoImagen, $arrayProducto);
                }
            }


            return $arrayProductoImagen;


        }
    }
}