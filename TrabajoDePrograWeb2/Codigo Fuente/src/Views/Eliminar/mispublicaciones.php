
<div class="container">
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



    <tr>
    </thead>
    <tbody>


        <?php
        $total = 0;
        $tope = count($publicaciones);

        for ($i = 0; $i <$tope; $i++) {
            $titulo = $publicaciones[$i]["titulo"];
            $idPublicacion= $publicaciones[$i]["id"];
            $nombreProducto = $productos[$i][0]["nombre"];
            $precio = $productos[$i][0]["precio"];
            $descripcion=$productos[$i][0]["descripcion"];
            $cantidad=$productos[$i][0]["cantidad"];
            $idProducto=$productos[$i][0]["id"];
            $nro = $i + 1;

            echo '<tr>
                <th scope="row">' . $nro . '</th>           
                <td> ' . $titulo . '  </td>
                <td> ' . $nombreProducto . ' </td>
                <td> ' . $precio . '</td>
                <td>' . $cantidad . ' </td>
                <td>' . $descripcion . ' </td>
                <td>' . $idPublicacion . ' </td>

                <td> 
                
            <form action="' . getBaseAddress() . 'Modificar/modificar' . '" method="POST">
             <input type="hidden" name="idProducto"  value="'.$idProducto.'">
            <input type="hidden" name="idPublicacion"  value="'.$idPublicacion.'">
             <input type="submit" value="Modificar">
            
            </form></td> 
            
             <td> 
                
            <form action="' . getBaseAddress() . 'Eliminar/eliminarPublicacion' . '" method="POST">
             <input type="hidden" name="idProducto"  value="'.$idProducto.'">
            <input type="hidden" name="idPublicacion"  value="'.$idPublicacion.'">
             <input type="submit" value="eliminar">
            
            </form></td> 
            </tr>';
        }

        ?>

</table>

</div>