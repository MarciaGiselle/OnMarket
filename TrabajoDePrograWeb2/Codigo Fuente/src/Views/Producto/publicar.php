

<script src="<?php echo getBaseAddress() . "Webroot/js/login.js" ?>"></script>

<!-–Publicacion-–>
<br>
<div class="container mt-3">
    <h3 class="text-primary text-center mb-4">Crear publicación</h3>
    <form method="post" action="<?php echo getBaseAddress(). "Producto/altaProducto" ?>" method="post" enctype="multipart/form-data">

        <div class="form-group col-md-12 pl-0">
            <label class="text-primary">Indicá un título para tu publicación*</label>
            <input class="form-control" type="text" placeholder="Titulo...  " name="titulo" id="titulo">
            <small id="passwordHelpBlock" class="form-text text-muted">Usá palabras clave para que lo encuentren
                fácilmente.
            </small>

            <div id="errortitulo" class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <small class="text-center"></small>
            </div>

        </div>

        <div class="form-group col-md-12 pl-0">
            <hr>
            <label class="text-primary">Método de entrega*</label>
            <div class="form-check">
                <input type="checkbox" name="envio[]" value="acordarConElVendedor" id="entrega">
                <label class="form-check-label">Acordar con el vendedor</label>
            </div>


            <div class="form-check">
                <input type="checkbox" name="envio[]" value="Correo" id="envio">
                <label class="form-check-label">Realizar envío por correo</label>
            </div>
            <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errorenvio">
                <i class="fa fa-exclamation-circle  mr-2" ></i>
                <small class="text-left"></small>
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
                        <option value="0" selected>Seleccionar...</option>
                        <option value="electronica">Electrónica</option>
                        <option value="moda">Moda y belleza</option>
                        <option value="mascotas">Mascotas</option>
                        <option value="herramientas">Herramientas</option>
                        <option value="muebles">Muebles y hogar</option>
                        <option value="deportes">Deportes y bicicletas</option>
                        <option value="musica">Música, arte y libros</option>
                        <option value="jardin">Jardín y decoración</option>
                    </select>
                    <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errorCategoria">
                        <i class="fa fa-exclamation-circle  mr-2"></i>
                        <small class="text-left"></small>
                    </div>

                </div>

                <div class="form-group col-md-6">
                    <label class="text-primary">Indicá un nombre para tu producto*</label>
                    <input class="form-control" type="text" placeholder="Nombre..." name="nombre" id="nombre">
                    <small id="passwordHelpBlock" class="form-text text-muted">Usá palabras clave para que lo encuentren
                        fácilmente.
                    </small>
                    <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errorName">
                        <i class="fa fa-exclamation-circle  mr-2"></i>
                        <small class="text-left"></small>
                    </div>
                </div>


                <div class="form-group col-md-12">
                    <label class="text-primary">Describí tu producto*</label>
                    <textarea class="form-control"  rows="3" name="descripcion" id="descripcion"
                              placeholder="Aprovechá para contar otros detalles de tu producto. Ordenalos en forma de lista para que sea más fácil de leer."></textarea>
                    <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errordescripcion">
                        <i class="fa fa-exclamation-circle  mr-2"></i>
                        <small class="text-left"></small>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="text-primary">Cantidad disponible*</label>
                    <input type="text" class="form-control" name="cantidad" placeholder="Unidades en stock" id="cantidad">
                    <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errorcantidad">
                        <i class="fa fa-exclamation-circle  mr-2"></i>
                        <small class="text-left"></small>
                    </div>
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
                    <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errorprecio">
                        <i class="fa fa-exclamation-circle  mr-2"></i>
                        <small class="text-left"></small>
                    </div>
                </div>

                <div class="form-group col-md-12">
<hr>
                    <label class="text-primary">Seleccioná las imágenes*</label>
                    <small id="passwordHelpBlock" class="form-text text-muted">Mostralo en detalle, con fondo blanco y
                        bien iluminado. No incluyas logos, banners ni textos promocionales. Mínimo 2(dos) imagenes.
                    </small>
                    <br>
                    <form class="container">

                        <div class="row">

                            <div class="col-sm">
                                <div class="form-group bg-secondary text-white">
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
                        <input type="submit"  value="Realizar publicación" class="btn btn-primary" id="publicar">
                    </div>

            </div>


    </form>
    <br>
</div>


<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/publicar.js" ?>"></script>