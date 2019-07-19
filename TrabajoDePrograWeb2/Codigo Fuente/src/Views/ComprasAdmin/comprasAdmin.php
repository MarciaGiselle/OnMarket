<script>
    const pathValorar = "<?php echo getBaseAddress() . "usuario/valorar"; ?>";
</script>
<link rel="stylesheet" href="<?php echo getBaseAddress() . "Webroot/css/estrellas.css" ?>">

<div class="container-fluid">

    <h3 class="text-primary text-center mt-4 mb-3">Tus compras</h3>

    <?php
    $total = 0;
    $tope = count($misCompras);
    if ($tope > 0) {
        echo '<div class="container-fluid mb-5">
<table class=" table table-hover text-center mt-4 mb-2">
        <thead>
        <tr class="font-weight-bold">
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Fecha</th>
            <th scope="col">Número de tarjeta</th>
            <th scope="col">Vendedor</th>
         

        </tr>
        </thead>

        <tbody id="cuadro" class="justify-content-around align-items-center text-center my-auto">';
        for ($i = 0; $i < $tope; $i++) {
            $nro = $i + 1;
            $idProducto = $misCompras[$i]["prod"]["id"];
            echo '<tr>
        <th scope="row">' . $nro . '</th>
        <td> ' . $misCompras[$i]["prod"]["nombre"] . '  </td>
        <td> ' . $misCompras[$i]["compra"]["cantidad"] . '  </td>
        <td> ' . $misCompras[$i]["compra"]["fecha"] . ' </td>
        <td> ' . $misCompras[$i]["tarjeta"]["numero"] . '  </td>
        <td> ' . $misCompras[$i]["vendedor"]["userName"] . '  </td>
       

       
        </tr>  ';

        }
        echo '</tbody>
    </table>
</div>';
    } else {

        echo '
               <div class="container">
                 <div class="alert d-flex alert-danger p-1 align-items-center rounded text-center justify-content-center mb-5" role="alert" >
                        <i class="fa fa-exclamation-circle fa-2x mr-2 "></i>
                        <h5 class="text-center mb-0">El usuario no tiene Compras</h5>
                   </div>
                 </div>';
    }
    ?>
</div>





<script src="<?php echo getBaseAddress() . "Webroot/js/valoracion.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>



