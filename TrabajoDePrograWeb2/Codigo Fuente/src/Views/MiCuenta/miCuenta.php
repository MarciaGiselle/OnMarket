
<div class="container-fluid mt-5">

    <h3 class="text-primary text-center  mb-3">Tu cuenta en Pesos</h3>

    <?php
    $total = 0;
    if(isset($cuenta)){
        echo '<div class="container-fluid mb-5">
<table class=" table table-hover text-center mt-4 mb-2">
        <thead>
        <tr class="font-weight-bold">
            <th scope="col">Fecha de último depósito</th>
            <th scope="col">Total Neto</th>
            <th scope="col">Ganancia Obtenida</th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody id="cuadro" class="justify-content-around align-items-center text-center my-auto">
  <tr>
        
        <td>' . $cuenta["fecha_deposito"] . '  </td>
        <td>$ ' . $cuenta["monto"] . '  </td>
        <td>$ ' . $cuenta["comisionAlSistema"] . ' </td>
        <td> <button type="button" class="btn btn-primary disabled" id="enviarDatos">Realizar Extracción</button></td>
        </tr> 
        </tbody>
    </table>
</div>';
    } else {
        echo '
               <div class="container">
                 <div class="alert d-flex alert-danger p-1 align-items-center rounded text-center justify-content-center mb-5" role="alert" >
                        <i class="fa fa-exclamation-circle fa-2x mr-2 "></i>
                        <h5 class="text-center mb-0">No tiened Dinero en tu Cuenta</h5>
                   </div>
                 </div>';
    }
    ?>
</div>



<script src="<?php echo getBaseAddress() . "Webroot/js/valoracion.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>



