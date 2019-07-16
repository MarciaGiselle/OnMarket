<main>
<div class="container-fluid mt-5">
    <h3 class="text-primary text-center mb-4">Tus publicaciones realizadas</h3>



        <?php
        $total = 0;
        if(! isset($publicaciones) || count($publicaciones)> 0){
        $tope = count($publicaciones);
        echo '<table class=" table table-hover text-center">
    <thead>
    <tr class="font-weight-bold">
        <td scope="col">#</td>
        <td scope="col">Imagen</td>
        <td scope="col">Titulo</td>
        <td scope="col">Nombre</td>
        <td scope="col">Precio</td>
        <td scope="col">Cantidad</td>
        <td scope="col">Descripcion</td>
        <td scope="col">Estado</td>
        <td scope="col">Editar</td>
        <td scope="col">Desactivar</td>
    <tr>
    </thead>
    <tbody>';

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
            $img=$imagen[$i]["nombre"];
            $nro = $i + 1;

            echo '<tr class="text-center">
                <th class="align-middle" scope="row">' . $nro . '</th>     
                <td class="align-middle"><img height="100px" src="../Webroot/imgCargadas/'. $img . '"></td>
                <td class="align-middle"> ' . $titulo . '  </td>
                <td class="align-middle text-primary font-weight-bold"> ' . $nombreProducto . ' </td>
                <td class="align-middle">$ ' . $precio . '</td>
                <td class="align-middle">' . $cantidad . ' </td>
                <td class="align-middle">' . $descripcion . ' </td>
                <td class="align-middle">' . $nombreEstado . ' </td>
                <td class="align-middle"> 
                
            <form action="' . getBaseAddress() . 'Modificar/modificar' . '" method="POST">
             <input type="hidden" name="idProducto"  value="'.$idProducto.'">
            <input type="hidden" name="idPublicacion"  value="'.$idPublicacion.'">
             <input class="btn btn-primary" type="submit" value="Modificar">
            
            </form></td> 
            
             <td class="align-middle"> 
                
            ';

            if ($estado == 1) {
                echo '<form action="' . getBaseAddress() . 'MisPublicaciones/publicacionInactiva' . '" method="POST">
            
                   <input type="hidden" name="idPublicacion"  value="' . $idPublicacion . '">
                  <input class="btn btn-primary" type="submit" value="Desactivar">
            
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
        }else{

            echo  '
<div class="container">

                    <div class="alert d-flex alert-success p-1 align-items-center rounded text-center justify-content-center mb-5" role="alert" >
                        <i class="fa fa-comments-dollar fa-2x mr-3 "></i>
                        <h5 class="text-left mb-0">No hay publicaciones disponibles<br>Empieza a vender!</h5>
                       </div>
                       </div>';


        }

        ?>




</table>
</div>
</main>