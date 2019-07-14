<script>


    const pathComentarios = "<?php echo getBaseAddress() . "MostrarProducto/AgregarComentario"; ?>";

</script>

<table id="tabla">
    <tr>
        <td>Comentario</td>
        <td>Fecha</td>
        <td>Publicacion</td>
        <td>respuesta</td>

    </tr>
    <?php
    $x=0;

    for($x=0 ;$x<count($resultados) ;$x++) {


        for($i=0 ;$i<count($resultados[$x]) ;$i++) {
            echo'<tr>';
            echo '<td class="col-5 col-auto">
             <h6>' . $resultados[$x][$i]["comentario"]["mensaje"] . '</h6>
             
             </td>';

            echo '<td>'.$resultados[$x][$i]["comentario"]["fecha"].'</td>';
            echo '<td>'.$publicaciones[$x]["titulo"].'</td>';
            if (!empty($resultados[$x][$i]["respuesta"])) {
                echo '<td id="div2" class="div2 col-9 col-auto ">
             
             <h6>' . $resultados[$x][$i]["respuesta"]["mensaje"] . '</h6>
            
             ';

                echo '</td>';
            }else {

                $idComentario=  $resultados[$x][$i]["comentario"]["id"];
                $idProducto= $publicaciones[$x]["id_Producto"];


                echo '<td><button onclick="pasarDatos(' . $idComentario.','.$idProducto.')" type="button" class="btn btn-primary ml-2 " data-toggle="modal"
            data-target="#exampleModalCenter"  >Responder</button></td>';
                echo '<tr>';
            }
        }
    }
    ?>


</table>

<input type="hidden" id="idVendedor" value="4">
<table id="tabla2">
</table>











MODAL-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">contesta el mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <label>Escriba su respuesta</label>

                <div>
                    <label for="comentario" class="mt-4" >Dejanos tu comentario</label>
                    <textarea class="form-control" rows="3" name="comentario" id="comentario" placeholder="Opiniones, cosas positivas, cosas negativas."></textarea>
                </div>

                <input type="hidden" id="idComentario" name="idComentario" value="">
                <button class="btn btn-primary" id="enviarDatos" >Enviar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

            </div>



            <div class="d-none alert-danger p-1 rounded justify-content-around p-1 error mt-1" id="errorDescripcion">
                <i class="fa fa-exclamation-circle error"></i>
                <small class="text-left"></small>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo getBaseAddress() . "Webroot/js/responder.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/agregarComentario.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>