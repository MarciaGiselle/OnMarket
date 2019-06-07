
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=#><img id="logo-nav" src="Webroot/img/logotipo.png" alt="Logo de OnMarket"></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <!-- Opciones -->

        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo getBaseAddress()."Usuario/mostrarInicio" ?>"> Inicio<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Historial</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo getBaseAddress()."Producto/publicar" ?>">Publicar</a>
            </li>

        </ul>

        <!-- Buscador-->

        <div class="input-group">
            <form class="form-check-inline">
                <input type="text" class="form-control" placeholder="Que estás buscando?">
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


