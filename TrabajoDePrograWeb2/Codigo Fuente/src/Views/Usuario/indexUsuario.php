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
            <li class="nav-item">

                <a class="nav-link " href="<?php echo getBaseAddress() . 'Carrito/verCarrito'?>"> Mi carrito
                   <?php if(!isset($_SESSION["carrito"])){
                       $contador=0;
                       echo $contador;}else{
                    echo "<h5>".count($_SESSION["carrito"])."</h5>";
                    }
                  ?>
                </a>

            </li>
            <li class="nav-item ">
                <a class="nav-link active" href= "<?php echo getBaseAddress() . "Producto/publicar" ?>">Publicar</a>
        </ul>

        <!--boton busqueda -->
        <form action="<?php echo getBaseAddress() . "Buscador/busqueda" ?>" method="post">
            <input type="submit" value="Realizar una búsqueda" class="btn btn-light">
        </form>


    </div>




    <!-- Cerrar sesion -->
    <div class="d-inline-flex mr-2">
        <form action="<?php echo getBaseAddress() . "Usuario/cerrarSesion" ?>" method="post">
            <!-- cambiar url -->

            <input type="submit" value="Cerrar Sesión "class="btn btn-outline-light">

        </form>
    </div>




</nav>




<!-–Slider de fotos -–>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../Webroot/img/pagos.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../Webroot/img/alimentos.jpg" alt="Second slide">

        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../Webroot/img/celulares.jpg" alt="Third slide">
        </div>

        <!-–Controladores -–>
        <div class="container-fluid">
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>



<!-–Categorias populares -–>
<hr>
<div class="container">
    <p class="text-secondary text-uppercase text-center">Encontrá lo que buscás</p>

    <h3 class="text-primary text-center">Categorías populares</h3>
    <br>


    <div class="card-deck">

        <div class="card border-primary p-3">
            <a href="#" ><img class="card-img-top" src="../Webroot/img/ropaperro.jpg" alt="Card image cap"></a>
            <hr>
            <div class="card-body text-primary">
                <h5 class="card-title">ACCESORIOS PARA MASCOTAS</h5>
                <p class="card-text">Descubrí las mejores prendas para que tus amigos no tengan frío en este invierno.</p>
            </div>
        </div>


        <div class="card border-primary p-3">
            <a href="#" ><img class="card-img-top" src="../Webroot/img/tecnologia.jpg" alt="Card image cap"></a>
            <hr>
            <div class="card-body text-primary">
                <h5 class="card-title">ELECTRÓNICA</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>


        <div class="card border-primary p-3">
            <a href="#" ><img class="card-img-top" src="../Webroot/img/cajaherramientas.jpg" alt="Card image cap"></a>
            <hr>
            <div class="card-body text-primary">
                <h5 class="card-title">HERRAMIENTAS</h5>
                <p class="card-text">Siempre necesarios, te ofrecemos los mejores precios para que los tengas a mano en tu casa.</p>
            </div>
        </div>

    </div>
</div>

<!-–Card destacada -–>

<div class="container">
    <hr>
    <p class="text-secondary text-uppercase text-center">subtitulo</p>

    <h3 class="text-primary text-center">Algun titulo aqui</h3>
    <br>
    <div class="card-group">
        <div class="card bg-secondary text-white">

            <img src="../Webroot/img/grisnav.png" class="card-img" alt="...">
            <div class="card-img-overlay">
                <div class="col-md-4 p-lg-4 mx-auto my-auto">

                    <p class="font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p>
                    <a class="btn btn-outline-secondary" href="#">Coming soon</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<!-- Footer -->
<footer class="bg-primary page-footer font-small blue pt-4">

    <!-- Copyright -->
    <div class="bg-secondary text-dark footer-copyright text-center py-3">© 2019 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/education/bootstrap/"> OnMarket.com</a>
    </div>
    <!-- Copyright -->

</footer>
</body>

<script src="<?php echo getBaseAddress() . "Webroot/js/login.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/buscador.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>


























