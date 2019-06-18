
<body>
<?php

if(isset($_SESSION["logueado"])){

    include_once ("navLogueado.php") ;
}else{
    include_once ("navNoLogueado.php");
}
?>

<h2>Tus Productos</h2>
<form action="<?php echo getBaseAddress(). 'Tarjeta/tarjeta' ?>" method="POST">
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
var_dump($_SESSION);
    for($i=0;$i<$tope;$i++ ){
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


?>


<table>
     <input type='hidden' name='total' value='<?php echo $total; ?>' />
<input type="submit" class="btn btn-primary" value="Comprar" >
</form>
</body>
