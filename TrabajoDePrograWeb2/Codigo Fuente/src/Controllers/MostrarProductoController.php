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
            $id=$datos["id"];
            $producto = new Producto();
            $prodEncontrado= $producto->buscarUnProductoPorPk($id);

            $d["resultado"] = $prodEncontrado;
            $d["title"]=$prodEncontrado["nombre"];

            $publicacion=new Publicacion();

            /*$publicacionDelProducto=$publicacion->traerPublicaciondelProducto($id);

             $idUser=$publicacionDelProducto["id_user"];
            $usuario=new Usuario();

            $usuarioDeLaPublicacion=$usuario->traerUserPorPk($idUser);

            $idLocalizacion=  $usuarioDeLaPublicacion["id_localizacion"];
            $localizacion=new Localizacion();

            $localizacionDelUser=$localizacion->traerLocalizacionPorId($idLocalizacion);

            $lat=$localizacionDelUser["latitud"];
            $lon=$localizacionDelUser["longitud"];*/
        $lat=-34.6686986;
        $lon=-58.5614947;
            $imagen =new Imagen();
            $d["imagen"] = $imagen->imagenPk($id);
            $nombre=explode(" ", $prodEncontrado["nombre"]);
            $d["productosRelacionados"]=($this->mostrarProductosRelacionados($nombre[0],$id));
            $d["lat"] = $lat;
           $d["lon"] = $lon;


            $this->set($d);
            $this->render(Constantes::MOSTRARVIEW);
        
    }


   function mostrarProductosRelacionados($nombre,$id) 
{
      

        $productoABuscar = new Producto();
        $imagenABuscar= new Imagen();

        $productoABuscar->setNombre($nombre);

        $idsProductos=$productoABuscar->buscarProductoEnLaBase();

        if(empty($idsProductos)){
            echo "no hay productos relacionados";
        }else{

        $productosEncontrados=[];
        $imagenesEncontradas=[];

        foreach ($idsProductos as $pk){
            array_push($productosEncontrados, $productoABuscar->filasPorPk($pk));
            array_push($imagenesEncontradas, $imagenABuscar->primerImagenPorPk($pk));
        }

        $arrayProductoImagen=[];
     

        for($i=0;$i<count($idsProductos); $i++){
            $producto=$productosEncontrados[$i];
            $imagen=$imagenesEncontradas[$i];

            if($producto[0]["id"]!==$id){
                $arrayProducto=[
                "prod"=>$producto,
                "imagen"=>$imagen];
               
            array_push($arrayProductoImagen, $arrayProducto);
 }
        }


        return $arrayProductoImagen;



}
}
}