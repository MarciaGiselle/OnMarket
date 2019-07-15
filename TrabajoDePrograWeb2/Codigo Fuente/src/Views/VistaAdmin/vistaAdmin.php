
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

<script src="<?php echo getBaseAddress() . "Webroot/js/login.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/buscador.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>


























