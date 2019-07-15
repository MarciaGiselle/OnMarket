<nav class="navbar navbar-expand-lg  navbar-dark bg-primary fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo getBaseAddress() ?>"><img id="logo-nav" src="../Webroot/img/logotipo.png" alt="Logo de OnMarket"></a>


    <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-2 mt-2 mt-lg-0">
            <li class="nav-item ">
                <a class="nav-link disabled" href="<?php echo getBaseAddress() . "Usuario/mostrarInicio" ?>">Inicio<span class="sr-only">(current)</span></a>
            </li>


            <li class="nav-item dropdown disabled">
                <a class="nav-link dropdown-toggle disabled" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Publicaciones</a>
                <div class="dropdown-menu">

                    <a class="dropdown-item text-success " href="<?php echo getBaseAddress() . "Producto/publicar" ?>" >Nueva Publicación</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item text-info" href="<?php echo getBaseAddress() . "MisPublicaciones/publicaciones" ?>">Mis Publicaciones</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item text-info" href="<?php echo getBaseAddress() . "Preguntas/preguntas" ?>">Preguntas</a>

                </div>

            </li>
        </ul>
        <!--boton busqueda -->
        <div class="btn btn-light text-center mr-2 d-inline-block justify-content-around align-items-center text-center">
            <a class="text-decoration-none text-dark" href="<?php echo getBaseAddress() . "Buscador/busqueda" ?>">
                <i class="fas fa-search mr-2"></i>
                <span class="text-dark text-center align-self-center">Realizar una búsqueda</span>
            </a>
        </div>
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
    </div>
</nav>