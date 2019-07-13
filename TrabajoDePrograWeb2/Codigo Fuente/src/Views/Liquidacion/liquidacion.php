<script>
    const pathLiquidar = "<?php echo getBaseAddress() . "Liquidacion/crearLiquidacion"; ?>";
</script>


<body>
<?php

if (isset($_SESSION["logueado"])) {

    include_once("navLogueado.php");
} else {
    include_once("navNoLogueado.php");
}
?>

<div class="container mt-4">
    <h5 class="text-primary d-flex justify-content-center mt-3">Nueva Liquidación</h5>
    <small class="text-muted d-flex justify-content-center text-center mb-5">Seleccione el mes y el año que desea liquidar</small>

    <div class="form-row justify-content-center my-4">
        <div class="col-md-3 input-group mb-3">

            <div class="input-group-prepend">
                <label class="input-group-text" for="year">Año</label>
            </div>
            <select class="custom-select" id="year" name="year">
                <option value="" selected disabled>Seleccione un Año</option>
                <?php
                for ($i = 0; $i < count($year); $i++) {
                    echo '<option value="' . $year[$i]["id"] . '"> ' . $year[$i]["year"] . '</option>';
                }
                ?>
            </select>
            <div id="errorYear" class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <span class="text-center"></span>
            </div>

        </div>
    </div>

        <div class="form-row justify-content-center my-4">

        <div class="col-md-3 input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="mes">Mes</label>
            </div>
            <select class="custom-select" id="mes" name="mes">
                <option value="" selected disabled>Seleccione un Mes</option>

                <?php
                for ($i = 0; $i < count($meses); $i++) {
                    echo '<option value="' . $meses[$i]["id"] . '"> ' . $meses[$i]["nombre"] . '</option>';
                }
                ?>
            </select>

            <div id="errorMes"
                 class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <span class="text-center"></span>
            </div>
        </div>
    </div>


    <div class="row justify-content-center mt-5">
        <div class="btn btn-primary btn-lg ">
            <input type="submit" value="Generar Liquidación" class="btn btn-primary" id="liquidar">
        </div>
    </div>
</div>


<!-- Footer -->
<footer class="bg-primary page-footer font-small blue pt-4 fixed-bottom">

    <!-- Copyright -->
    <div class="bg-secondary text-dark footer-copyright text-center py-3">© 2019 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/education/bootstrap/"> OnMarket.com</a>
    </div>
    <!-- Copyright -->

</footer>

</body>

<script src="<?php echo getBaseAddress() . "Webroot/js/liquidacion.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>