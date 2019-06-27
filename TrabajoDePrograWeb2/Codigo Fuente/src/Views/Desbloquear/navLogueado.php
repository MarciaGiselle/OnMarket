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
            <a class="nav-link active" href="<?php echo getBaseAddress() . "PerfilesDeUsuarios/usuarios" ?>">perfiles</a>
        </li>


        <li class="nav-item">
            <a class="nav-link active" href="<?php echo getBaseAddress() . "MisPublicaciones/publicaciones" ?>">Historial</a>
        </li>





        <li class="nav-item ">
            <a class="nav-link active" href= "<?php echo getBaseAddress() . "Producto/publicar" ?>">Publicar</a>
    </ul>

    <!--boton busqueda -->
    <form action="<?php echo getBaseAddress() . "Buscador/busqueda" ?>" method="post">
        <input type="submit" value="Realizar una búsqueda" class="btn btn-light">
    </form>
</div>

<div class="btn btn-dark text-center mr-2 d-inline-block justify-content-around align-items-center text-center">
    <a class="text-decoration-none text-light" href="<?php echo getBaseAddress() . "Carrito/verCarrito" ?>">
        <i class="fas fa-shopping-cart mr-2"></i>
        <span class="text-light text-center align-self-center">Mi carrito</span>
        <?php if (isset($_SESSION["carrito"])) {
            echo  " <div class='ml-1 d-inline-block bg-success rounded-pill'>
                <span class='mr-2 ml-2 font-weight-bolder'>  ".count($_SESSION["carrito"]). "</span>
            </div>";
        };?>

</div></a>
<div class="d-inline-flex mr-2">
    <form method="post" action= "<?php echo getBaseAddress() . "Usuario/cerrarSesion" ?>" >
        <input type="submit" value="Cerrar Sesión "class="btn btn-outline-light">
    </form>
</div>

</nav>