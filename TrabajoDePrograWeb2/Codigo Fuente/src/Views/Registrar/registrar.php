<script>
    const pathRegistrar = "<?php echo getBaseAddress() . "Registrar/validarRegistro"; ?>";
    const pathHome = "<?php echo getBaseAddress() . "Usuario/mostrarInicio"; ?>";
    const pathLoguear = "<?php echo getBaseAddress() . "Usuario/login"; ?>";
    const pathBuscador = "<?php echo getBaseAddress() . "Buscador/buscador"; ?>";

</script>



<?php

if(isset($_SESSION["logueado"])){

    include_once ("navLogueado.php") ;
}else{
    include_once ("navNoLogueado.php");
}
?>
<main>
    <div class="container">
        <br>
        <h3 class="text-primary ">Registrarse</h3>
        <hr>



        <div class="form-row">

            <div class="form-group col-md-6">
                <label class="text-primary " for="name">Nombre:</label>
                <input class="form-control" type="text" id="name" name="name">
            </div>
            <div class="d-none alert-danger p-1 rounded justify-content-around error" id="errorName">
                <i class="fa fa-exclamation-circle error"></i>
                <small class="text-left"></small>
            </div>


            <div class="form-group col-md-6">
                <label class="text-primary " for="apellido">Apellido:</label>
                <input class="form-control" type="text" id="apellido" name="apellido">
            </div>
            <div class="d-none alert-danger p-1 rounded justify-content-around error" id="errorApellido">
                <i class="fa fa-exclamation-circle error"></i>
                <small class="text-left"></small>
            </div>

            <div class="form-group col-md-6">
                <label class="text-primary " for="correo">Correo:</label>
                <input class="form-control" type="email" id="correo" name="correo">
            </div>
            <div class="d-none alert-danger p-1 rounded justify-content-around error" id="errorCorreo">
                <i class="fa fa-exclamation-circle error"></i>
                <small class="text-left"></small>
            </div>

            <div class="form-group col-md-6">
                <label class="text-primary " for="cuit">Cuit:</label>
                <input class="form-control" type="text" id="cuit" name="cuit">
            </div>
            <div class="d-none alert-danger p-1 rounded justify-content-around error" id="errorCuit">
                <i class="fa fa-exclamation-circle error"></i>
                <small class="text-left"></small>
            </div>

            <div class="form-group col-md-6">
                <label class="text-primary " for="nombreUsuario">Nombre de usuario:</label>
                <input class="form-control" type="text" id="nombreUsuario" name="nombreUsuario">
            </div>
            <div class="d-none alert-danger p-1 rounded justify-content-around error" id="errorNombreUsuario">
                <i class="fa fa-exclamation-circle error"></i>
                <small class="text-left"></small>
            </div>

            <div class="form-group col-md-6">
                <label class="text-primary " for="pass">Contraseña:</label>
                <input class="form-control" type="password" id="pass" name="pass">
            </div>
            <div class="d-none alert-danger p-1 rounded justify-content-around error" id="errorContraseña">
                <i class="fa fa-exclamation-circle error"></i>
                <small class="text-left"></small>
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


            <div class=" custom-checkbox my-1 mr-sm-2">
                <input  type="checkbox"  id="terminos"/>
                <label class="text-primary" for="terminos">Acepto términos y condiciones</label>
            </div>
            <div class="d-none alert-danger p-1 rounded justify-content-around error" id="errorTerminos">
                <i class="fa fa-exclamation-circle error"></i>
                <small class="text-left"></small>
            </div>

            <hr>
            <br>

            <div class="btn btn-primary btn-lg btn-block">
                <input class="btn btn-primary" type="button"  id="registrar" value="Enviar registro">
            </div>

        </div>


    </div>
</main>

<br>

<footer class="bg-primary page-footer font-small blue pt-4">


    <!-- Copyright -->

    <div class="bg-secondary text-dark footer-copyright text-center py-3">© 2019 Copyright:

        <a class="text-dark" href="https://mdbootstrap.com/education/bootstrap/"> OnMarket.com</a>

    </div>

    <!-- Copyright -->


</footer>


<script src="<?php echo getBaseAddress() . "Webroot/js/registrar.js" ?>"></script>

<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>




