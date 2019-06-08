<script>
    const pathLoguear = "<?php echo getBaseAddress() .  "Usuario/login" ; ?>";
</script>

<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=#><img id="logo-nav" src="Webroot/img/logotipo.png" alt="Logo de OnMarket"></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-2 mt-2 mt-lg-0">
            <li class="nav-item ">
                <a class="nav-link active" href="#">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Historial</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link disabled" href= "#">Publicar</a>
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

    <!-- Contenedor de iniciar sesion -->
    <div class="d-inline-flex">
        <div class="dropdown dropleft">

            <button class="btn btn-outline-light mr-sm-2" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Iniciar Sesión
            </button>

            <div class="dropdown-menu p-3" >

                <div class="form-group">
                    <label for="exampleDropdownFormEmail2">Usuario</label>
                    <input type="text" class="form-control"  placeholder="User"
                           name="nombre" id="inputName">
                </div>

                <div class="form-group">
                    <label for="exampleDropdownFormPassword2">Contraseña</label>
                    <input type="text" class="form-control" id="inputPass" placeholder="Contraseña"
                           name="pass">
                </div>

                <input type="submit" class="btn btn-primary" value="Iniciar Sesión" name="ingresar" id="ingresar"/>


            </div>

        </div>

    </div>

    <div>
        <!--registrar -->
        <form action="<?php echo getBaseAddress() . "Registrar/registrar" ?>" method="post">

            <input type="submit" value="  Registrarse " class="btn btn-secondary">

        </form>
    </div>

    </nav>


<script src="<?php echo getBaseAddress() . "Webroot/js/login.js" ?>"></script>


