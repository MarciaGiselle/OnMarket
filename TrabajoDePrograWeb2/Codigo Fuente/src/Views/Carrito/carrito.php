<script>
    const pathCompra= "<?php echo getBaseAddress(). "Usuario/compra" ; ?>";

</script>


<body>
<h2>Tus Productos</h2>

<table>
   <tr>
        <td>id</td>
        <td>producto</td>
        <td>precio</td>
        <td>cantidad</td>
       <td>Subtotal</td>

   <tr>


    <?php
    $total=0;
    $tope=count($_SESSION["carrito"]);

    for($i=1;$i<=$tope;$i++ ){
        $cantidad=$_SESSION["carrito"][$i]["cantidad"];
        $precio=$_SESSION["carrito"][$i]["precio"];
        $subtotal=$cantidad*$precio;
        $total+=$subtotal;

     echo "<tr>";
         echo "<td>".$_SESSION["carrito"][$i]["id"]."</td>";
        echo "<td>".$_SESSION["carrito"][$i]["nombre"]."</td>";
        echo "<td>".$_SESSION["carrito"][$i]["precio"]."</td>";
        echo "<td>".$_SESSION["carrito"][$i]["cantidad"]."</td>";
         echo "<td>".$subtotal."</td>";

      echo "</tr>";



    }

     echo "<tr>";
      echo "<td>Total:</td>";
      echo "<td>".$total."</td>";
     echo "</tr>";

     echo "<input type='hidden' id='total' value='<?php echo $total; ?>' />";
?>


<table>

<button class="btn btn-primary" id="confirmar"  >Realizar compra</button>
</body>


<script src="<?php echo getBaseAddress() . "Webroot/js/comprar.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>