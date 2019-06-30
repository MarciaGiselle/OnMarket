<script>
    const pathCompra = "<?php echo getBaseAddress() . "Usuario/realizarCompra"; ?>";
    const pathHome = "<?php echo getBaseAddress() . "Usuario/mostrarInicio"; ?>";

</script>
<body>
<?php

if (isset($_SESSION["logueado"])) {

    include_once("navLogueado.php");
} else {
    include_once("navNoLogueado.php");
}
?>

<main>

    <div class="container align-items-center mb-5">

        <h3 class="text-primary text-center mt-3 mt-5">Complete los datos de su tarjeta</h3>
        <div class="form-row justify-content-md-center mt-4">
            <div class="form-group  col-md-3 d-inline-block">

                <label class="text-primary " for="numeroDeTarjeta">Número de tarjeta</label>
                <input class="form-control my-1" type="text" id="numeroDeTarjeta" placeholder="1235 1259 0065 4569">
                <div class="d-none alert-danger p-1 rounded justify-content-around error" id="errorNumero">
                    <i class="fa fa-exclamation-circle"></i>
                    <small class="text-left"></small>
                </div>

                <label class="text-primary mt-3" for="codigoDeSeguridad">Código de seguridad</label>
                <input class="form-control my-1" type="password" id="codigoDeSeguridad" placeholder="***">
                <div class="d-none alert-danger p-1 rounded justify-content-around error" id="errorCodigo">
                    <i class="fa fa-exclamation-circle"></i>
                    <small class="text-left"></small>
                </div>

                <label class="text-primary mt-3" for="fechaDeVencimiento">Fecha de vencimiento</label>
                <input class="form-control my-1" type="date" id="fechaDeVencimiento" placeholder="">
                <div class="d-none alert-danger p-1 rounded justify-content-around error" id="errorFecha">
                    <i class="fa fa-exclamation-circle"></i>
                    <small class="text-left"></small>
                </div>

                <input type="hidden" id="total" value="<?php echo $total; ?>">

            </div>

            <div class="btn btn-primary btn-lg btn-block">

                <input type="submit" value="Finalizar compra" class="btn btn-primary" id="confirmar">

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

</body>

<script src="<?php echo getBaseAddress() . "Webroot/js/comprar.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>