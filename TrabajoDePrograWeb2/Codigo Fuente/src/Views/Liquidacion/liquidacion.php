<script>
    const pathLiquidar = "<?php echo getBaseAddress() . "Liquidacion/crearLiquidacion"; ?>";
    const pathVerLiquidaciones = "<?php echo getBaseAddress() . "Liquidacion/mostrarLiquidaciones"; ?>";

</script>

<div class="container mt-4">
    <h5 class="text-primary d-flex justify-content-center mt-3">Nueva Liquidación</h5>
    <small class="text-muted d-flex justify-content-center text-center mb-5">Seleccione el mes y el año que desea
        liquidar
    </small>

    <div class="form-row justify-content-center my-4">
        <div class="col-md-3">
            <div class="input-group">
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
            <div id="errorYear"
                 class="d-none alert-danger p-1 rounded justify-content-center error w-100 my-2 align-items-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <span class="text-center"></span>
            </div>
            </div>
        </div>



        <div class="col-md-3 mb-3">
            <div class="input-group">
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

    </div>


    <div class="row justify-content-center mt-5">
        <div class="btn btn-primary btn-lg ">
            <input type="submit" value="Generar Liquidación" class="btn btn-primary" id="liquidar">
        </div>
    </div>
</div>


<div class='container' id="resultados">

        <?php
        if (count($liquidaciones) > 0){
            echo '    <h5 class="text-primary d-flex justify-content-center mt-5">Liquidaciones Realizadas</h5>

<table id="tablaLiquidaciones" class=\'table table-hover text-center mt-4\'>
            <thead><tr>
                <th class="text-primary ">ID</th>
                <th class="text-primary ">Fecha de Liquidacion</th>
                <th class="text-primary ">Mes liquidado</th>
                <th class="text-primary ">Año</th>
                <th class="text-primary ">Total Facturado</th>
                <th class="text-primary ">Ganancia obtenida</th>
                 <th class="text-primary "></th>

            </tr>
            </thead>';
            for ($i = 0; $i < count($liquidaciones); $i++) {

                echo '<tr>
                <td align="center"> ' . $liquidaciones[$i]["liq"]["id"] . '</td>
                <td align="center"> ' . $liquidaciones[$i]["liq"]["fecha_liquidacion"] . ' </td>
                <td align="center"> ' . $liquidaciones[$i]["mes"] . ' </td>
                <td align="center"> ' . $liquidaciones[$i]["year"] . ' </td>
                <td align="center">$ ' . $liquidaciones[$i]["liq"]["total"] . ' </td>
                <td align="center">$ ' . $liquidaciones[$i]["liq"]["ganancia"] . ' </td>
                <td><button class="btn btn-info align-items-center" type="submit"><i class="fas fa-eye fa-2x" style="color: whitesmoke;" ></i>  </button>
                 <input type="hidden" name="id"  value="">  
                   </td>
                </tr> ';
            }
            echo '</table>';
        }else {

            echo '<div class="container mt-4">
                   <div class="alert d-flex alert-danger p-1 align-items-center rounded text-center justify-content-center mb-5" role="alert" >
                      <i class="fa fa-exclamation-circle fa-2x mr-2 "></i>
                      <h5 class="text-center mb-0">No hay liquidaciones que mostrar</h5>
                    </div>
                </div>';
        }
        ?>

</div>


<script src="<?php echo getBaseAddress() . "Webroot/js/liquidacion.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>