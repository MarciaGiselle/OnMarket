
<body>
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=#><img id="logo-nav" src="../Webroot/img/logotipo.png" alt="Logo de OnMarket"></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-2 mt-2 mt-lg-0">
            <li class="nav-item ">
                <a class="nav-link active" href="<?php echo getBaseAddress() . "Usuario/mostrarInicio" ?>">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Historial</a>
            </li>
            <li class="nav-item">

                <a class="nav-link " href="<?php echo getBaseAddress() . 'Carrito/carrito'?>"> Mi carrito
                   <?php if(!isset($_SESSION["carrito"])){
                       $contador=0;
                       echo $contador;}else{
                    echo "<h5>".count($_SESSION["carrito"])."</h5>";
                    }
                  ?>
                </a>

            </li>
            <li class="nav-item ">
                <a class="nav-link active" href= "<?php echo getBaseAddress() . "Producto/publicar" ?>">Publicar</a>
        </ul>

        <!--boton busqueda -->
        <form action="<?php echo getBaseAddress() . "Buscador/busqueda" ?>" method="post">
            <input type="submit" value="Realizar una búsqueda" class="btn btn-light">
        </form>


    </div>




    <!-- Cerrar sesion -->
    <div class="d-inline-flex mr-2">
        <form action="<?php echo getBaseAddress() . "Usuario/cerrarSesion" ?>" method="post">
            <!-- cambiar url -->

            <input type="submit" value="Cerrar Sesión "class="btn btn-outline-light">

        </form>
    </div>




</nav>

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


?>


<table>
     <input type='hidden' name='total' value='<?php echo $total; ?>' />
<input type="submit" class="btn btn-primary" value="Comprar" >
</form>
</body>
