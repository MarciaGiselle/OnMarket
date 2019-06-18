<script>
    const pathCarrito = "<?php echo getBaseAddress() . "Usuario/agregarAlCarrito"; ?>";

</script>
<body>
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=#><img id="logo-nav" src="../Webroot/img/logotipo.png" alt="Logo de OnMarket"></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-2 mt-2 mt-lg-0">
            <li class="nav-item ">
                <a class="nav-link active" href="<?php echo getBaseAddress() . "Usuario/mostrarInicio" ?>">Inicio<span
                            class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Historial</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link active" href="<?php echo getBaseAddress() . "Producto/publicar" ?>">Publicar</a>
        </ul>

        <!--boton busqueda -->
        <form action="<?php echo getBaseAddress() . "Buscador/busqueda" ?>" method="post">
            <input type="submit" value="Realizar una búsqueda" class="btn btn-light">
        </form>


    </div>





</nav>


<div class="container mt-4">
    <div class="row">

        <div class="col-sm">

            <?php
            $tope = count($imagen);
            for ($i = 0; $i < $tope; $i++) {
                $img = $imagen[$i]["nombre"];
                echo '<img class="rounded float-left" width="500px" height="150px" src="../Webroot/imgCargadas/' . $img . ' " alt="' . $img . '">';
            }
            ?>

        </div>

        <div class="col-sm">
            <div class="card-body">
                <h3 class="card-title"><?php echo $resultado["nombre"]; ?></h3>
                <h1 class="card-subtitle mb-2 text-muted">$<?php echo $resultado["precio"]; ?></h1>
                <hr>
                <label class="text-secondary d-inline">Cantidad disponible:</label>
                <h4> <?php echo $resultado["cantidad"]; ?></h4>

                <label class="text-secondary d-inline" for="descripcion">Descripción:</label>
                <h5 id="descripcion"><?php echo $resultado["descripcion"]; ?></h5>

                <label class="text-secondary mt-2" for="id">Unidades a comprar:</label>
                <input class="rounded d-block" type="number" value="1" name="id" id="cantidad">

                <input class="btn btn-primary mt-5 mr-2" type="reset" value="Cancelar">
                <button class="btn btn-primary mt-5" id="agregar">Agregar Al carrito</button>
            </div>

            <input type="hidden" name="id" id="nombre" value="<?php echo $resultado["nombre"]; ?>">

            <input type="hidden" name="id" id="precio" value="<?php echo $resultado["precio"]; ?>">

            <input type="hidden" name="id" id="id" value="<?php echo $resultado["idProducto"]; ?>">


        </div>
    </div>
</div>

</body>
<script src="<?php echo getBaseAddress() . "Webroot/js/agregarAlCarrito.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/slideDeProductos.js" ?>"></script>


