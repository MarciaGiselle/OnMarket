<body>
<table>


        <?php
        $total = 0;
        $tope = count($publicaciones);
        for ($i = 0; $i < $tope; $i++) {
            $titulo = $publicaciones[$i]["titulo"];
            $idPublicacion= $publicaciones[$i]["id"];
            $nombreProducto = $productos[$i][0]["nombre"];
            $precio = $productos[$i][0]["precio"];
            $descripcion=$productos[$i][0]["descripcion"];
            $cantidad=$productos[$i][0]["cantidad"];
            $idProducto=$productos[$i][0]["idProducto"];
            echo '<tr>
               
                <td> ' . $titulo . '  </td>
                <td> ' . $nombreProducto . ' </td>
                <td> ' . $precio . '</td>
                <td>' . $cantidad . ' </td>
                <td>' . $descripcion . ' </td>
                <td>
                
            ';


           //no estoy segura de los nombres
            echo  '
            <form action="' . getBaseAddress() . 'Modificar/modificar' . '" method="POST">
             <input type="text" name="idProducto"  value="'.$idProducto.'">
            <input type="text" name="idPublicacion"  value="'.$idPublicacion.'">
             <input type="submit" value="Modificar">
            
            </form>';
        }



        ?>




</table>

</body>