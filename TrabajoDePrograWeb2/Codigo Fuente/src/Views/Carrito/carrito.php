<script>
    const pathEliminar = "<?php echo getBaseAddress() . "Carrito/eliminarProducto"; ?>";
</script>

<body>
<?php

if (isset($_SESSION["logueado"])) {

    include_once("navLogueado.php");
} else {
    include_once("navNoLogueado.php");
}
?>
<div class="container text-center align-items-center"><br>
    <h2 class="text-primary text-center mt-3 mb-3">Tus Productos</h2>




        <?php
        $total = 0;
        $tope = count($listaProductos);
        if($tope>0){
        for ($i = 0; $i < $tope; $i++) {
            $idProducto = $listaProductos[$i]["producto"][0]["id"];
            $nombre = $listaProductos[$i]["producto"][0]["nombre"];
            $cantidad = $listaProductos[$i]["cantidad"];
            $precio = $listaProductos[$i]["producto"][0]["precio"];
            $subtotal = $cantidad * $precio;
            $total += $subtotal;
            $nro = $i + 1;
            echo '
    <table class=" table table-hover text-center mt-4">
        <thead>
        <tr class="font-weight-bold">
            <td scope="col">#</td>
            <td scope="col">Producto</td>
            <td scope="col">Precio</td>
            <td scope="col">Cantidad</td>
            <td scope="col">Subtotal</td>
            <td scope="col"></td>

        <tr>
        </thead>
        <tbody><td>
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

            <form action="'. getBaseAddress() . 'Compra/ingresarTarjeta' .'" method="POST">
                <input type="hidden" name="total" value=.$total. />
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
                       </div>
                   
    <!--boton busqueda -->
    <form action="'. getBaseAddress() . 'Buscador/busqueda'.' " method="post">
        <input type="submit" value="Realizar una búsqueda" class="btn btn-lg btn-primary">
    </form> </div>';
        }
        ?>


</div>
</body>
<script src="<?php echo getBaseAddress() . "Webroot/js/eliminarDelCarrito.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>
