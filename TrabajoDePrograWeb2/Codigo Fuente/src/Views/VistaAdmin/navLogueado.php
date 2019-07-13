<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href=#><img id="logo-nav" src="Webroot/img/logotipo.png" alt="Logo de OnMarket"></a>

<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-2 mt-2 mt-lg-0">
        <li class="nav-item ">
            <a class="nav-link active" href="<?php echo getBaseAddress() . "VistaAdmin/admin" ?>">Inicio<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="<?php echo getBaseAddress() . "PerfilesDeUsuarios/usuarios" ?>">Perfiles</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="<?php echo getBaseAddress() . "Estadisticas/estadisticas" ?>">Estadisticas</a>
        </li>

        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Liquidaciones</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo getBaseAddress() . "Liquidacion/liquidacion" ?>">Nueva Liquidación</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </li>



    </ul>



<div class="d-inline-flex mr-2">
    <form method="post" action= "<?php echo getBaseAddress() . "Usuario/cerrarSesion" ?>" >
        <input type="submit" value="Cerrar Sesión "class="btn btn-outline-light">
    </form>
</div>

</nav>