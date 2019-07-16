<nav class="navbar navbar-expand-lg  navbar-dark bg-primary fixed-top">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand d-flex" href=#><img id="logo-nav" src="../Webroot/img/logotipo.png" alt="Logo de OnMarket"></a>


    <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-2 mt-2 mt-lg-0">
        <li class="nav-item ">
            <a class="nav-link active" href="<?php echo getBaseAddress() . "Usuario/mostrarInicio" ?>">Inicio<span class="sr-only">(current)</span></a>
        </li>


        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Publicaciones</a>
            <div class="dropdown-menu">

            <a class="dropdown-item text-success " href="<?php echo getBaseAddress() . "Producto/publicar" ?>" >Nueva Publicación</a>
                <div class="dropdown-divider"></div>

            <a class="dropdown-item text-info" href="<?php echo getBaseAddress() . "MisPublicaciones/publicaciones" ?>">Mis Publicaciones</a>
            <div class="dropdown-divider"></div>

            <a class="dropdown-item text-info" href="<?php echo getBaseAddress() . "Preguntas/preguntas" ?>">Preguntas</a>

            </div>
        </li>
    </ul>



</div>


    <!--boton busqueda -->
    <div class="btn btn-light text-center mr-2 d-inline-block justify-content-around align-items-center text-center">
        <a class="text-decoration-none text-dark" href="<?php echo getBaseAddress() . "Buscador/busqueda" ?>">
            <i class="fas fa-search mr-2"></i>
            <span class="text-dark text-center align-self-center">Realizar una búsqueda</span>
        </a>
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
    </a>
</div>


<div class="d-inline-flex mr-2">
        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle text-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user mr-2"></i>
                <span class=" text-center align-self-center"> <?php echo $nombreUsuario ?></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item text-info" href="<?php echo getBaseAddress() . "MiCuenta/miCuenta" ?>">Mi Cuenta</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-info" href= "<?php echo getBaseAddress() . "MisCompras/mostrarHistorial" ?>">Compras</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-info disabled" href= "<?php echo getBaseAddress() . "MisVentas/ventas" ?>">Ventas</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-warning" href= "<?php echo getBaseAddress() . "Usuario/cerrarSesion" ?>">Cerrar Sesión</a>
            </div>
        </div>

</div>

</nav>