<body>
<?php

if (isset($_SESSION["logueado"])) {

    include_once("navLogueado.php");
} else {
    include_once("navNoLogueado.php");
}
?>
<div class="container text-center align-items-center"><br>
    <h2 class="text-primary text-center mt-3 mb-2">Tus Productos</h2>


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
        <tbody>

        <?php
        $total = 0;
        $tope = count($listaProductos);
        for ($i = 0; $i < $tope; $i++) {
            $idProducto = $listaProductos[$i]["producto"][0]["idProducto"];
            $nombre = $listaProductos[$i]["producto"][0]["nombre"];
            $cantidad = $listaProductos[$i]["cantidad"];
            $precio = $listaProductos[$i]["producto"][0]["precio"];
            $subtotal = $cantidad * $precio;
            $total += $subtotal;
            $nro = $i + 1;
            echo '<button>
                <th scope="row">' . $nro . '</th>
                <td> ' . $nombre . '  </td>
                <td> ' . $precio . ' </td>
                <td> ' . $cantidad . '</td>
                <td>$ ' . $subtotal . ' </td>
                <td>
                
            <form action="' . getBaseAddress() . 'Carrito/eliminarProducto' . '" method="POST">
                <button type="submit" id="eliminar">
                <input type="hidden" name="idEliminado" id="idEliminado" value= "'.$idProducto.'">
                <i class="far fa-trash-alt fa-lg" style="color: red;" ></i>
                </button>
                </tr>
              </form>';
        }

        echo "<tr>";
        echo "<th scope=\"row\"></th>";
        echo "<td class='font-weight-bold' colspan='3'>Total:</td>";
        echo "<td class='font-weight-bold'>$" . $total . "</td>";
        echo "</tr>";


        ?>

        <table>

            <form action="<?php echo getBaseAddress() . 'Compra/ingresarTarjeta' ?>" method="POST">
                <input type='hidden' name='total' value='<?php echo $total; ?>'/>
                <div class="btn btn-primary btn-lg btn-block">
                    <input type="submit" value="Finalizar Compra" class="btn btn-primary" id="publicar">
                </div>
            </form>
</div>
</body>
<script src="<?php echo getBaseAddress() . "Webroot/js/eliminarDelCarrito.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>
