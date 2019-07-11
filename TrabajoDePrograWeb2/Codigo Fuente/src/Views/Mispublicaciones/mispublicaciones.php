<body>

<?php

if(isset($_SESSION["logueado"])){
if(isset($_SESSION["admin"])){
    include_once ("navLogueadoAdmin.php") ;
}else{
    include_once ("navLogueado.php") ;
}

}else{
    include_once ("navNoLogueado.php");
}
?>
<table class=" table table-hover text-center mt-4">
    <thead>
    <tr class="font-weight-bold">
        <td scope="col">#</td>
        <td scope="col">titulo</td>
        <td scope="col">nombre</td>
        <td scope="col">precio</td>
        <td scope="col">cantidad</td>
        <td scope="col">descripcion</td>
        <td scope="col">id</td>
        <td scope="col">Estado</td>



    <tr>
    </thead>
    <tbody>


        <?php
        $total = 0;
        $tope = count($publicaciones);

        for ($i = 0; $i <$tope; $i++) {
            $titulo = $publicaciones[$i]["titulo"];
            $idPublicacion= $publicaciones[$i]["id"];
            $estado= $publicaciones[$i]["id_Estado"];
            $nombreProducto = $productos[$i][0]["nombre"];
            $precio = $productos[$i][0]["precio"];
            $descripcion=$productos[$i][0]["descripcion"];
            $cantidad=$productos[$i][0]["cantidad"];
            $idProducto=$productos[$i][0]["id"];
            $nombreEstado=$estados[$i][0]["nombre"];
            $nro = $i + 1;

            echo '<tr>
                <th scope="row">' . $nro . '</th>           
                <td> ' . $titulo . '  </td>
                <td> ' . $nombreProducto . ' </td>
                <td> ' . $precio . '</td>
                <td>' . $cantidad . ' </td>
                <td>' . $descripcion . ' </td>
                <td>' . $idPublicacion . ' </td>
                <td>' . $nombreEstado . ' </td>
                <td> 
                
            <form action="' . getBaseAddress() . 'Modificar/modificar' . '" method="POST">
             <input type="hidden" name="idProducto"  value="'.$idProducto.'">
            <input type="hidden" name="idPublicacion"  value="'.$idPublicacion.'">
             <input class="btn btn-primary" type="submit" value="Modificar">
            
            </form></td> 
            
             <td> 
                
            ';

            if ($estado == 1) {
                echo '<form action="' . getBaseAddress() . 'MisPublicaciones/publicacionInactiva' . '" method="POST">
            
                   <input type="hidden" name="idPublicacion"  value="' . $idPublicacion . '">
                  <input class="btn btn-primary" type="submit" value="Inactivar Publicacion">
            
                   </form>';

            } else {
                echo '<form action="' . getBaseAddress() . 'MisPublicaciones/publicacionActiva' . '" method="POST">
            
                   <input type="hidden" name="idPublicacion"  value="' . $idPublicacion . '">
                  <input class="btn btn-primary" type="submit" value="Activar Publicacion">
            
                   </form>
                   </td> 
            </tr>';
            }



        }

        ?>




</table>

</body>