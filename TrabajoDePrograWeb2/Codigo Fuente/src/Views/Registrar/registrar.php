<script>
    const pathRegistrar = "<?php echo getBaseAddress() . "Registrar/validarRegistro"; ?>";
    const pathHome = "<?php echo getBaseAddress() . "Usuario/mostrarInicio"; ?>";
    const pathLoguear = "<?php echo getBaseAddress() . "Usuario/login"; ?>";
    const pathBuscador = "<?php echo getBaseAddress() . "Buscador/buscador"; ?>";

</script>


<div class="container mt-4 mb-4">
    <br>
    <h3 class="text-primary ">Registrarse</h3>
    <hr>


    <div class="form-row">

        <div class="form-group col-md-6">
            <label class="text-primary " for="name">Nombre:</label>
            <input class="form-control" type="text" id="nombre" name="name">
            <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errorName">
                <i class="fa fa-exclamation-circle  mr-2"></i>
                <small class="text-left"></small>
            </div>
        </div>


        <div class="form-group col-md-6">
            <label class="text-primary " for="apellido">Apellido:</label>
            <input class="form-control" type="text" id="apellido" name="apellido">
            <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errorApellido">
                <i class="fa fa-exclamation-circle  mr-2"></i>
                <small class="text-left"></small>
            </div>
        </div>


        <div class="form-group col-md-6">
            <label class="text-primary " for="correo">Correo:</label>
            <input class="form-control" type="email" id="correo" name="correo">
            <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errorCorreo">
                <i class="fa fa-exclamation-circle  mr-2"></i>
                <small class="text-left"></small>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label class="text-primary " for="cuit">Cuit:</label>
            <input class="form-control" type="text" id="cuit" name="cuit">
            <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errorCuit">
                <i class="fa fa-exclamation-circle  mr-2"></i>
                <small class="text-left"></small>
            </div>
        </div>


        <div class="form-group col-md-6">
            <label class="text-primary " for="nombreUsuario">Nombre de usuario:</label>
            <input class="form-control" type="text" id="nombreUsuario" name="nombreUsuario">
            <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errorNombreUsuario">
                <i class="fa fa-exclamation-circle  mr-2"></i>
                <small class="text-left"></small>
            </div>
        </div>


        <div class="form-group col-md-6">
            <label class="text-primary " for="pass">Contraseña:</label>
            <input class="form-control" type="password" id="pass" name="pass">
            <div class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center" id="errorContraseña">
                <i class="fa fa-exclamation-circle  mr-2"></i>
                <small class="text-left"></small>
            </div>
        </div>


        <div class="form-group col-md-6">
            <label class="text-primary" for="pass2">Repetir Contraseña:</label>
            <input class="form-control" type="password" id="pass2" name="pass2">
        </div>


        <div class="form-group col-md-6">
            <label class="text-primary " for="sexo">Sexo:</label>
            <select class="form-control" id="sexo" name="sexo">
                <option>Hombre</option>
                <option>Mujer</option>
                <option>Otros</option>
            </select>


        </div>


        <div class=" form-group col-md-12">
            <input type="checkbox" id="terminos"/>
            <label class="text-primary" for="terminos">Acepto términos y condiciones</label>
            <div class="d-none alert-danger p-1 rounded justify-content-center error w-50 my-2 align-items-center" id="errorTerminos">
                <i class="fa fa-exclamation-circle  mr-2"></i>
                <small class="text-left"></small>
            </div>

        </div>

        <div class=" form-group col-md-12">
            <div class="buscador mb-3">
                <h6 class="text-primary">Ingrese una dirección:</h6>

                <div class="form-row">
                    <div class="col-7">
                        <input type="text" class="form-control" id="direccion" placeholder="Mi ubicación...">
                    </div>
                    <button class="btn btn-primary" id="buscar" name="btnBuscar">Buscar</button>
                </div>

                <div class="d-none alert-danger p-1 rounded justify-content-center error w-50 my-2 align-items-center" id="errorDireccion">
                    <i class="fa fa-exclamation-circle  mr-2"></i>
                    <small class="text-left"></small>
                </div>

                <small id="passwordHelpBlock" class="form-text text-muted">Esta dirección será visible en todas tus
                    publicaciones.
                </small>
            </div>

            <div class="container-fluid d-none" id="contenedorMapa">

                <?php
                include_once("mapa2.php")
                ?>

                <input class="form-control" type="hidden" id="lat">
                <input class="form-control" type="hidden" id="lon">
            </div>
        </div>

            <hr>
            <br>


            <div class="btn btn-primary btn-lg btn-block">
                <input class="btn btn-primary" type="button" id="registrar" value="Enviar registro">
            </div>

        </div>


    </div>


    <script src="<?php echo getBaseAddress() . "Webroot/js/registrar.js" ?>"></script>

    <script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>




