
<body>
<?php

if(isset($_SESSION["logueado"])){

    include_once ("navLogueado.php") ;
}else{
    include_once ("navNoLogueado.php");
}
?>
<div class="container text-center align-items-center" ><br>
<h2 class="text-primary text-center mt-3 mb-2">Tus Productos</h2>

<form action="<?php echo getBaseAddress(). 'Tarjeta/tarjeta' ?>" method="POST">
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
    $total=0;
    $tope=count($_SESSION["carrito"]);
    for($i=0;$i<$tope;$i++ ){
        $cantidad=$_SESSION["carrito"][$i]["cantidad"];
        $precio=$_SESSION["carrito"][$i]["precio"];
        $subtotal=$cantidad*$precio;
        $total+=$subtotal;
$nro=$i+1;
     echo "<tr>";
       echo "<th scope=\"row\">".$nro."</th>";
        echo "<td>".$_SESSION["carrito"][$i]["nombre"]."</td>";
        echo "<td>".$_SESSION["carrito"][$i]["precio"]."</td>";
        echo "<td>".$_SESSION["carrito"][$i]["cantidad"]."</td>";
         echo "<td>$".$subtotal."</td>";
        echo "<td><a class='btn' href='#'><i class=\"far fa-trash-alt fa-lg\" style='color: red' ></i></a></td>";

      echo "</tr>";



    }

     echo "<tr>";
    echo "<th scope=\"row\"></th>";
    echo "<td class='font-weight-bold' colspan='3'>Total:</td>";
      echo "<td class='font-weight-bold'>$".$total."</td>";
     echo "</tr>";


?>

<table>
     <input type='hidden' name='total' value='<?php echo $total; ?>' />
    <div class="btn btn-primary btn-lg btn-block">
        <input type="submit"  value="Finalizar Compra" class="btn btn-primary" id="publicar" >
    </div>

</form>
</div>
</body>
