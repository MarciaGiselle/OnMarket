
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=#><img id="logo-nav" src="../Webroot/img/logotipo.png" alt="Logo de OnMarket"></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-2 mt-2 mt-lg-0">
            <li class="nav-item ">
                <a class="nav-link active" href="<?php echo getBaseAddress() . "Usuario/mostrarInicio" ?>">Inicio<span
                            class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Historial</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active">Publicar</a>
        </ul>

        <!--boton busqueda -->
        <form action="<?php echo getBaseAddress() . "Buscador/busqueda" ?>" method="post">
            <input type="submit" value="Realizar búsqueda" class="btn btn-secondary">
        </form>

    </div>
    <!-- Cerrar sesion -->
    <div class="d-inline-flex mr-2">
        <form action="<?php echo getBaseAddress() . "Usuario/cerrarSesion" ?>" method="post">
            <!-- cambiar url -->

            <input type="submit" value="Cerrar Sesión " class="btn btn-outline-light">

        </form>
    </div>


</nav>


<script src="<?php echo getBaseAddress() . "Webroot/js/login.js" ?>"></script>

<!-–Publicacion-–>
<br>
<div class="container">
    <h3 class="text-primary">Crear publicación</h3>
    <form method="post" action="<?php echo getBaseAddress(). "Producto/altaProducto" ?>" method="post" enctype="multipart/form-data">

        <div class="form-group col-md-12">
            <label class="text-primary">Indicá un título para tu publicación*</label>
            <input class="form-control" type="text" placeholder="Titulo...  " name="titulo" id="titulo">
            <small id="passwordHelpBlock" class="form-text text-muted">Usá palabras clave para que lo encuentren
                fácilmente.
            </small>
        </div>

        <div class="form-group col-md-12">
            <hr>
            <label class="text-primary">Método de entrega*</label>
            <div class="form-check">
                <input type="checkbox" name="envio[]" value="acordarConElVendedor" id="entrega">
                <label class="form-check-label">Acordar con el vendedor</label>
            </div>


            <div class="form-check">
                <input type="checkbox" name="envio[]" value="Correo" id="entrega">
                <label class="form-check-label">Realizar envío por correo</label>
            </div>
        </div>


            <hr>

            <h3 class="text-primary">Crear producto</h3>
            <small id="passwordHelpBlock" class="form-text text-muted">*Datos obligatorios.</small>
            <hr>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="text-primary">Seleccioná una categoría*</label>
                    <select class="custom-select" id="inputGroupSelect01" name="categoria" id="categoria">
                        <option selected>Seleccionar...</option>
                        <option value="electronica">Electrónica</option>
                        <option value="moda">Moda y belleza</option>
                        <option value="mascotas">Mascotas</option>
                        <option value="herramientas">Herramientas</option>
                        <option value="muebles">Muebles y hogar</option>
                        <option value="deportes">Deportes y bicicletas</option>
                        <option value="musica">Música, arte y libros</option>
                        <option value="jardin">Jardín y decoración</option>
                    </select>

                </div>

                <div class="form-group col-md-6">
                    <label class="text-primary">Indicá un nombre para tu producto*</label>
                    <input class="form-control" type="text" placeholder="Nombre...  " name="nombre" id="nombre">
                    <small id="passwordHelpBlock" class="form-text text-muted">Usá palabras clave para que lo encuentren
                        fácilmente.
                    </small>
                </div>


                <div class="form-group col-md-12">
                    <label class="text-primary">Describí tu producto*</label>
                    <textarea class="form-control"  rows="3" name="descripcion" id="descripcion"
                              placeholder="Aprovechá para contar otros detalles de tu producto. Ordenalos en forma de lista para que sea más fácil de leer."></textarea>

                </div>

                <div class="form-group col-md-6">
                    <label class="text-primary">Cantidad disponible*</label>
                    <input type="text" class="form-control" name="cantidad" placeholder="Unidades en stock" id="cantidad">
                </div>

                <div class="form-group col-md-6">
                    <label class="text-primary">Precio*</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control" name="precio" id="precio"
                               placeholder="Precio">
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="text-primary">Seleccioná las imágenes*</label>
                    <small id="passwordHelpBlock" class="form-text text-muted">Mostralo en detalle, con fondo blanco y
                        bien iluminado. No incluyas logos, banners ni textos promocionales. Mínimo 1(una) imagen.
                    </small>
                    <br>
                    <form class="container">

                        <div class="row">

                            <div class="col-sm">
                                <div class="form-group">
                                    <input name="enviar" type="submit" value="subir archivo" />
                                    <input type="hidden" value="<?php echo "../Webroot/imgCargadas" ?>" name="destino">
                                    <input type="file" class="form-control-file" name="imagen[]" accept="image/png, .jpeg, .jpg" multiple id="imagen">
                                </div>
                            </div>
                        </div>

                        <br>
                        <hr>
                    </form>
                </div>

                    <div class="btn btn-primary btn-lg btn-block">
                        <input type="submit"  value="Realizar publicación" class="btn btn-primary" id="publicar" >
                    </div>

            </div>


    </form>
    <br>
</div>

<footer class="bg-primary page-footer font-small blue pt-4">

    <!-- Copyright -->
    <div class="bg-secondary text-dark footer-copyright text-center py-3">© 2019 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/education/bootstrap/"> OnMarket.com</a>
    </div>
    <!-- Copyright -->

</footer>


<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/publicar.js" ?>"></script>