
<!-–Publicacion-–>
<br>
<div class="container">
 <h3 class="text-primary">Crear producto</h3>
 <small id="passwordHelpBlock" class="form-text text-muted">*Datos obligatorios.</small>
 <hr>

 <form action="<?php echo getBaseAddress()."Producto/altaProducto" ?>" method="post" enctype="multipart/form-data">
  <div class="form-row">

    <div class="form-group col-md-6">
      <label class="text-primary" >Seleccioná una categoría*</label>

      <select class="custom-select" id="inputGroupSelect01" name="categoria">
         <option value="null" selected>Seleccionar...</option>
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
          <input class="form-control" type="text" placeholder="Nombre...  " name="nombre" >
          <small id="passwordHelpBlock" class="form-text text-muted">Usá palabras clave para que lo encuentren fácilmente.</small>
      </div>


      <div class="form-group col-md-12">
      <label class="text-primary">Describí tu producto*</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion" placeholder="Aprovechá para contar otros detalles de tu producto. Ordenalos en forma de lista para que sea más fácil de leer."></textarea>

    </div>

    <div class="form-group col-md-6">
      <label class="text-primary">Cantidad disponible*</label>
      <input type="text" class="form-control" name="cantidad" placeholder="Unidades en stock">
    </div>

    <div class="form-group col-md-6">
      <label class="text-primary">Precio*</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">$</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="precio" placeholder="Precio">
      </div>
    </div>

      <div class="form-group col-md-12">
          <label class="text-primary">Seleccioná las imágenes*</label>
          <small id="passwordHelpBlock" class="form-text text-muted">Mostralo en detalle, con fondo blanco y bien iluminado. No incluyas logos, banners ni textos promocionales. Mínimo 1(una) imagen. </small>
          <br>
          <div class="container">

              <div class="row">

                  <div class="col-sm">
                      <div class="form-group">
                          <input type="file" class="form-control-file" name="imagen[]" accept="image/png, .jpeg, .jpg" multiple>
                      </div>
                  </div>
              </div>
                  <!--<div class="col-sm">
                      <div class="form-group">
                          <input type="file" class="form-control-file" name="imagen2">
                      </div>
                  </div>

              </div>

              <div class="row">

                  <div class="col-sm">
                      <div class="form-group">
                          <input type="file" class="form-control-file" name="imagen3">
                      </div>
                  </div>
              </div>-->
<br>
<hr>
      <h3 class="text-primary">Crear publicación</h3>

      <div class="form-group col-md-12">

          <label class="text-primary">Indicá un título para tu publicación*</label>
          <input class="form-control" type="text" placeholder="Titulo...  " name="titulo">
          <small id="passwordHelpBlock" class="form-text text-muted">Usá palabras clave para que lo encuentren fácilmente.</small>
      </div>

    <div class="form-group col-md-12">
      <hr>
      <label class="text-primary">Método de entrega*</label>

      <div class="form-check">
        <input type="checkbox" name="envioAcordar">
        <label class="form-check-label">Acordar con el vendedor</label>
      </div>


      <div class="form-check">
        <input type="checkbox" name="envioCorreo">
        <label class="form-check-label">Realizar envío por correo</label>
      </div>

      <hr>
    </div>





     

<div class="btn btn-primary btn-lg btn-block">
<input type="submit" value="Realizar publicación" class="btn btn-primary">
</div>
</div>





</form>
<br>
</div>

