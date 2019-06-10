<script>
    const pathHome = "<?php echo getBaseAddress(). "Buscador/buscador" ; ?>";
</script>
<body>

<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=#><img id="logo-nav" src="Webroot/img/logotipo.png" alt="Logo de OnMarket"></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-2 mt-2 mt-lg-0">
            <li class="nav-item ">
                <a class="nav-link active" href="<?php echo getBaseAddress() . "Usuario/mostrarInicio" ?>">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Historial</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href= "<?php echo getBaseAddress() . "Producto/publicar" ?>">Publicar</a>
        </ul>

        <!-- Buscador-->

        <div class="input-group">
            <form class="form-check-inline" action="<?php echo getBaseAddress() .  "Buscador/buscarProducto" ?>"  method="post">
                <input type="text" class="form-control" placeholder="Que estás buscando?"  id="buscador" name="buscarProducto">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

    </div>
    <!-- Cerrar sesion -->
    <div class="d-inline-flex mr-2">
        <form action="<?php echo getBaseAddress() . "Usuario/cerrarSesion" ?>" method="post">
            <!-- cambiar url -->

            <input type="submit" value="Cerrar Sesión "class="btn btn-outline-light">

        </form>
    </div>



</nav>

<div id="resultado" name="resultado">
    <?php
    $resultado;
    $filasProductosCoincidentes=[];

    foreach($resultado as $prod){
        array_push($filasProductosCoincidentes, $prod);
    }

    echo "<div class='container'><table class='table table-striped'><tr>
                    <th scope='col'>CODIGO</th>
                    <th scope='col'>NOMBRE</th>
                    <th scope='col'>CANTIDAD</th>
                    <th scope='col'>DESCRIPCION</th>
                    <th scope='col'>PRECIO</th>
                    </tr>";
    foreach ($filasProductosCoincidentes as $fila){
    foreach ($fila as $producto){
        echo "<tr>

                       <td>" . $producto['idProducto']. "</td>
                       <td>" . $producto['nombre']. "</td>
                       <td>" . $producto['cantidad']. "</td>
                       <td>" . $producto['descripcion']. "</td>
                       <td>" . $producto['precio']. "</td>
                       </tr>";
    }
    } echo "</table></div>";


    ?>

</div>

<!-- Footer footer class="bg-primary page-footer font-small blue pt-4">


    <div class="bg-secondary text-dark footer-copyright text-center py-3">© 2019 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/education/bootstrap/"> OnMarket.com</a>
    </div>


</footer>
</body>-->


<script src="<?php echo getBaseAddress() . "Webroot/js/login.js" ?>"></script>

