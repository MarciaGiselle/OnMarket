<script>
    const pathBusqueda = "<?php echo getBaseAddress(). "Buscador/buscarProducto" ; ?>";
    const pathMostrarResultados = "<?php echo getBaseAddress(). "Buscador/mostrarResultados" ; ?>";
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
            <li class="nav-item ">
                <a class="nav-link " href= "<?php echo getBaseAddress() . "Producto/publicar" ?>">Publicar</a>
        </ul>




    </div>
    <!-- Cerrar sesion -->
    <div class="d-inline-flex mr-2">
        <form action="<?php echo getBaseAddress() . "Usuario/cerrarSesion" ?>" method="post">
            <input type="submit" value="Cerrar Sesión "class="btn btn-outline-light">
        </form>
    </div>
</nav>


<!-- Buscador-->
<br>
<div class="container">
    <h3 class="text-primary text-center mt-3">Qué estás buscando?</h3>

    <div class="input-group mt-5 mb-5">
    <input type="search" class="form-control" placeholder="Escribe algo que desees encontrar" id="buscador">
    <div class="input-group-append">
        <span type="submit" class="input-group-text" id="btnBuscar"><i class="fa fa-search" ></i></span>
    </div>

        <div class='container d-none' id="resultados">
            <form action="<?php echo getBaseAddress(). "Buscador/mostrar" ?>" method="post">
            <table id="tablaBuscador" class='table table-hover text-center mt-4' >
                <thead>
                <tr>
                    <th class="text-primary ">RESULTADOS ENCONTRADOS</th>
                </tr>
                </thead>

            </table>
            </form>
        </div>
</div>
</div>


<!-- Footer-->
 <footer class="bg-primary page-footer font-small blue pt-4">


    <div class="bg-secondary text-dark footer-copyright text-center py-3">© 2019 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/education/bootstrap/"> OnMarket.com</a>
    </div>


</footer>
</body>


<script src="<?php echo getBaseAddress() . "Webroot/js/buscador.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>


