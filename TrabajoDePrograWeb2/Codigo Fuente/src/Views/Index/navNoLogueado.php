<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=#><img id="logo-nav" src="Webroot/img/logotipo.png" alt="Logo de OnMarket"></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-2 mt-2 mt-lg-0">
            <li class="nav-item ">
                <a class="nav-link active" href="<?php echo getBaseAddress() . "Index/index" ?>">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Historial</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link disabled" href= "#">Publicar</a>
        </ul>

        <!--boton busqueda -->
        <form action="<?php echo getBaseAddress() . "Buscador/busqueda" ?>" method="post">
            <input type="submit" value="Realizar una búsqueda" class="btn btn-light">
        </form>
    </div>


  <div class="d-inline-flex">
        <div class="dropdown dropleft">
            <button class="btn btn-outline-light mr-sm-2" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Ingresar a mi cuenta</button>

            <div class="dropdown-menu p-2 mr-2" >
                <div class="form-group">
                    <label for="inputName" class="mb-0 font-weight-bolder">Usuario</label>
                    <input type="text" class="form-control my-1"  placeholder="User" name="nombre" id="inputName" data-toggle="popover" title="Nombre de usuario">
                    <div class="d-none alert-danger p-1 rounded justify-content-around error" id="errorNombre">
                        <i class="fa fa-exclamation-circle error"></i>
                        <small class="text-left"></small>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPass" class="mb-0 font-weight-bolder">Contraseña</label>
                    <input type="text" class="form-control  my-1" id="inputPass" placeholder="Contraseña" name="pass">
                    <div class="d-none alert-danger p-1 rounded justify-content-around p-1 error" id="errorPass">
                        <i class="fa fa-exclamation-circle"></i>
                        <small class="text-left"></small>
                    </div>
                </div>

                <input type="submit" class="btn btn-lg btn-primary" value="Iniciar Sesión" name="ingresar" id="ingresar"/>
            </div>
        </div>
    </div>

      <div>
        <!--registrar -->
        <form  method="post"  action="<?php echo getBaseAddress() . "Registrar/registrar" ?>" >
            <input type="submit" value="Registrarse" class="btn btn-secondary">
        </form>
    </div>";
</nav>