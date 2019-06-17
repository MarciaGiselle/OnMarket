<script>
    const pathCompra= "<?php echo getBaseAddress(). "Usuario/compra" ; ?>";

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




                <h2>Complete los datos de su tarjeta</h2>

     <label>Numero de tarjeta</label>
     <input type="text" id="numero" placeholder="1235 1259 0065 4569">

    <label>Codigo de seguridad</label>
    <input type="password" id="codigo" placeholder="******">

    <label>Fecha de vencimiento</label>
    <input type="date" id="fecha" placeholder="">

    <input type="hidden" id="total" value="<?php echo $total;?>">


                <button class="btn btn-primary" id="confirmar"  >Confirmar</button>

</body>


<script src="<?php echo getBaseAddress() . "Webroot/js/comprar.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>