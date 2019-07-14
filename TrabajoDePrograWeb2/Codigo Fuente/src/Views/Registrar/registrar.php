<script>
    const pathRegistrar = "<?php echo getBaseAddress() . "Registrar/validarRegistro"; ?>";
    const pathHome = "<?php echo getBaseAddress() . "Usuario/mostrarInicio"; ?>";
    const pathLoguear = "<?php echo getBaseAddress() . "Usuario/login"; ?>";
    const pathBuscador = "<?php echo getBaseAddress() . "Buscador/buscador"; ?>";

</script>


    <div class="container">
        <br>
        <h3 class="text-primary ">Registrarse</h3>
        <hr>



        <div class="form-row">

            <div class="form-group col-md-5">
                <label class="text-primary " for="name">Nombre:</label>
                <input class="form-control" type="text" id="name" name="name">
                <div class="d-none alert-danger p-1 rounded form-group col-md-4  error" id="errorName">
                    <i class="fa fa-exclamation-circle error"></i>
                    <small class="text-left"></small>
                </div>
            </div>



            <div class="form-group col-md-5">
                <label class="text-primary " for="apellido">Apellido:</label>
                <input class="form-control" type="text" id="apellido" name="apellido">
                <div class="d-none alert-danger p-1 rounded  form-group col-md-4 error" id="errorApellido">
                    <i class="fa fa-exclamation-circle error"></i>
                    <small class="text-left"></small>
                </div>
            </div>


            <div class="form-group col-md-5">
                <label class="text-primary " for="correo">Correo:</label>
                <input class="form-control" type="email" id="correo" name="correo">
                <div class="d-none alert-danger p-1 rounded  form-group col-md-4 error" id="errorCorreo">
                    <i class="fa fa-exclamation-circle error"></i>
                    <small class="text-left"></small>
                </div>
            </div>

            <div class="form-group col-md-5">
                <label class="text-primary " for="cuit">Cuit:</label>
                <input class="form-control" type="text" id="cuit" name="cuit">
                <div class="d-none alert-danger p-1 rounded  form-group col-md-5 error" id="errorCuit">
                    <i class="fa fa-exclamation-circle error"></i>
                    <small class="text-left"></small>
                </div>
            </div>


            <div class="form-group col-md-5">
                <label class="text-primary " for="nombreUsuario">Nombre de usuario:</label>
                <input class="form-control" type="text" id="nombreUsuario" name="nombreUsuario">
                <div class="d-none alert-danger p-1 rounded  form-group col-md-4 error" id="errorNombreUsuario">
                    <i class="fa fa-exclamation-circle error"></i>
                    <small class="text-left"></small>
                </div>
            </div>


            <div class="form-group col-md-5">
                <label class="text-primary " for="pass">Contraseña:</label>
                <input class="form-control" type="password" id="pass" name="pass">
                <div class="d-none alert-danger p-1 rounded  form-group col-md-4 error" id="errorContraseña">
                    <i class="fa fa-exclamation-circle error"></i>
                    <small class="text-left"></small>
                </div>
            </div>


            <div class="form-group col-md-5">
                <label class="text-primary" for="pass2">Repetir Contraseña:</label>
                <input class="form-control" type="password" id="pass2" name="pass2">
            </div>


            <div class="form-group col-md-5">
                <label class="text-primary " for="sexo">Sexo:</label>
                <select class="form-control" id="sexo" name="sexo">
                    <option>Hombre</option>
                    <option>Mujer</option>
                    <option>Otros</option>
                </select>


            </div>


            <div class=" form-group col-md-5">
                <input  type="checkbox"  id="terminos"/>
                <label class="text-primary" for="terminos">Acepto términos y condiciones</label>
                <div class="d-none alert-danger p-1 rounded form-group col-md-4 error" id="errorTerminos">
                    <i class="fa fa-exclamation-circle error"></i><br>
                    <small class="text-left"></small>
                </div>

            </div>

            <div class=" form-group col-md-5">
                <?php
                include_once ("mapa2.php")
                ?>

                <input class="form-control" type="hidden" id="lat">
                <input class="form-control" type="hidden" id="lon">
            </div>

            <hr>
            <br>
            

            <div class="btn btn-primary btn-lg btn-block">
                <input class="btn btn-primary" type="button"  id="registrar" value="Enviar registro">
            </div>

        </div>


    </div>



<script src="<?php echo getBaseAddress() . "Webroot/js/registrar.js" ?>"></script>

<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>




