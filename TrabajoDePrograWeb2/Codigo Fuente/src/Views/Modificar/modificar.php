
<!-–Publicacion-–>
<br>
<div class="container">
    <h3 class="text-primary">Modificar publicación</h3>
    <form  action="<?php echo getBaseAddress(). "Modificar/realizarCambios" ?>" method="post" enctype="multipart/form-data">

        <div class="form-group col-md-12">
            <label class="text-primary">Indicá un título para tu publicación*</label>
            <input class="form-control" type="text" placeholder="Titulo...  " value="<?php echo $publicacion[0]["titulo"];?>" name="titulo" id="titulo">
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
                <select class="custom-select"  id="inputGroupSelect01" name="categoria" id="categoria">
                    <option value="<?php echo $categoria; ?>" selected>Seleccionar...</option>
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
                <input class="form-control" type="text" value="<?php echo $producto["nombre"] ?>" placeholder="Nombre..." name="nombre" id="nombre">
                <small id="passwordHelpBlock" class="form-text text-muted">Usá palabras clave para que lo encuentren
                    fácilmente.
                </small>
                <div class="d-none alert-danger p-1 rounded justify-content-around p-1 error mt-1" id="errorNombre">
                    <i class="fa fa-exclamation-circle error"></i>
                    <small class="text-left"></small>
                </div>
            </div>


            <div class="form-group col-md-12">
                <label class="text-primary">Describí tu producto*</label>
                <textarea class="form-control"  rows="3"  name="descripcion" id="descripcion"
                          placeholder="Aprovechá para contar otros detalles de tu producto. Ordenalos en forma de lista para que sea más fácil de leer."><?php echo $producto["descripcion"] ?></textarea>
                <div class="d-none alert-danger p-1 rounded justify-content-around p-1 error mt-1" id="eerorDescripcion">
                    <i class="fa fa-exclamation-circle error"></i>
                    <small class="text-left"></small>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="text-primary">Cantidad disponible*</label>
                <input value="<?php echo $producto["cantidad"] ?>" type="text" class="form-control" name="cantidad" placeholder="Unidades en stock" id="cantidad">
            </div>

            <div class="form-group col-md-6">
                <label class="text-primary">Precio*</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input value="<?php echo $producto["precio"] ?>"type="text" class="form-control" name="precio" id="precio"
                           placeholder="Precio">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label class="text-primary">Seleccioná las imágenes*</label>
                <small id="passwordHelpBlock" class="form-text text-muted">Mostralo en detalle, con fondo blanco y
                    bien iluminado. No incluyas logos, banners ni textos promocionales. Mínimo 2(dos) imagen.
                </small>

              

                    <div class="">

                        <?php

                        $tope = count($imagen);

                        for ($i = 0; $i < $tope; $i++) {
                            $img = $imagen[$i]["nombre"];
                          
                                echo '<div  class="card d-inline-flex my-4 p-2" style="width: 8rem;">
                                        <img class="card-img-top" src="../Webroot/imgCargadas/' . $img . ' " alt="foto">
                                      </div>';
                           

                               

                        }
                        ?>
                    </div>
                    


                    <form class="container">

                        <div class="row">

                            <div class="col-sm">
                                <div class="form-group">

                                    <input type="hidden" value="<?php echo "../Webroot/imgCargadas" ?>" name="destino">
                                    <input type="file" class="form-control-file" name="imagen[]" accept=" .jpeg, .jpg" multiple id="imagen">
                                </div>
                            </div>
                        </div>

                        <br>
                        <hr>
                    </form>

            </div>

            <a href="<?php echo getBaseAddress(). "MisPublicaciones/publicaciones" ?>">
                <input   value="Cancelar" class="btn btn-secondary btn-lg" id="publicar" >
            </a>


            <input type="hidden"  value="<?php echo $producto["id"] ?>" name="idProducto" >
            <input type="hidden"  value="<?php echo $publicacion[0]["id"] ?>" name="idPublicacion" >
             <div>
                <input type="submit"  value="Confirmar cambios" class="ml-2  btn btn-primary btn-lg "  >
             </div>
    </form>
    <br>
</div>
