<script>
    const pathEliminar = "<?php echo getBaseAddress() . "Carrito/eliminarProducto"; ?>";
</script>


<div class="container text-center align-items-center"><br>
    <h2 class="text-primary text-center mt-3 mb-3">Tus Productos</h2>
 <form action="<?php echo getBaseAddress() . 'Compra/ingresarTarjeta' ?>" method="POST">
    <table class=" table table-hover text-center mt-4">



        <?php
        $total = 0;
        if(isset($listaProductos)){
        $tope = count($listaProductos);

            echo' <thead>
        <tr class="font-weight-bold">
            <th scope="row">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Subtotal</th>

            <th scope="col"></th>

        <tr>
        </thead>';
        for ($i = 0; $i < $tope; $i++) {
            $idProducto = $listaProductos[$i]["producto"][0]["id"];
            $nombre = $listaProductos[$i]["producto"][0]["nombre"];
            $cantidad = $listaProductos[$i]["cantidad"];
            $precio = $listaProductos[$i]["producto"][0]["precio"];

            $subtotal = $cantidad * $precio;
            $total += $subtotal;
            $nro = $i + 1;
            echo '
   
        <tbody><tr>
                <th scope="row">' . $nro . '</th>
                <td> ' . $nombre . '  </td>
                <td> ' . $precio . ' </td>
                <td> ' . $cantidad . '</td>
                <td>$ ' . $subtotal . ' </td>
                <td>
            <form action="' . getBaseAddress() . 'Carrito/eliminarProducto' . '" method="POST">
               
                <input type="hidden" name="idEliminado" id="idEliminado" value= "'.$idProducto.'">
                 <button type="submit" id="eliminar">
                <i class="far fa-trash-alt fa-lg" style="color: red;" ></i>
                </button>
                </td>
              </form>';
        }

        echo '<tr>
        <th scope="row"></th>
        <td class="font-weight-bold" colspan="3">Total:</td>
      <td class="font-weight-bold">$ '. $total .' </td>

       </tr>
            </table>


                <input type="hidden" name="total" value="'.$total.'" />

                <div class="btn btn-primary btn-lg btn-block">
                    <input type="submit" value="Siguiente Paso" class="btn btn-primary">
                </div>
            </form>';

        }else{

            echo  '
<div class="container">

                    <div class="alert d-flex alert-danger p-1 align-items-center rounded text-center justify-content-center mb-5" role="alert" >
                        <i class="fa fa-exclamation-circle fa-2x mr-2 "></i>
                        <h5 class="text-center mb-0">No hay productos en el carrito</h5>
                   
                       </div>
                       </div>';
                   

        }
        ?>


</div>

<script src="<?php echo getBaseAddress() . "Webroot/js/eliminarDelCarrito.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>
