<script>
    const pathCarrito= "<?php echo getBaseAddress(). "Usuario/agregarAlCarrito" ; ?>";

</script>
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

                <a class="nav-link " href="<?php echo getBaseAddress() . 'Carrito/VerCarrito'?>"> Mi carrito
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


<div class="container border border-primary rounded>">
    <div class="row">
        <div class="col-sm">



            <?php

             $tope=count($imagen);

             for($i=0;$i<$tope;$i++){
             $img=$imagen[$i]["nombre"];
             echo '<img class="rounded float-left" width="500px" height="150px" src="../Webroot/imgCargadas/'.$img.' " alt="'.$img.'">';
            }
            ?>
       </div>

        <div class="col-sm">
            <div class="card-body">
             <h1  class="card-title"><?php echo $nombre; ?></h1>

             <h2 class="card-subtitle mb-2 text-muted">$<?php echo $precio; ?></h2>


            <h2>cantidad disponible: <?php echo $cantidad; ?></h2>

           <h2><?php echo $descripcion; ?></h2>
                <label>Cantidad:</label>
                <input type="number" value="1" name="id" id="cantidad" >
         </div>


            <input type="hidden" name="id" id="nombre" value="<?php echo $nombre; ?>">
            <input type="hidden" name="id" id="precio" value="<?php echo $precio; ?>">

            <input type="hidden" name="id" id="id" value="<?php echo $idProducto; ?>">
             <input class="btn btn-primary" type="reset" value="Cancelar">
            <button class="btn btn-primary" id="comprar" >Agregar Al carrito</button>

    </div>
    </div>
</div>
</div>

</body>
<script src="<?php echo getBaseAddress() . "Webroot/js/agregarAlCarrito.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>