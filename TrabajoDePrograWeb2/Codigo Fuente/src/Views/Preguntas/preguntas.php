<script>


    const pathComentarios = "<?php echo getBaseAddress() . "MostrarProducto/AgregarComentario"; ?>";

</script>
<div class="container-fluid mt-5">
    <h3 class="text-primary text-center mb-3">Historial de Preguntas</h3>

    <table class="table table-hover text-center mt-4 mb-2" id="tabla">
    <thead>


    <tr class="font-weight-bold">

        <th scope="col">Comentario</th>
        <th scope="col">Fecha</th>
        <th scope="col">Publicacion</th>
        <th scope="col" >Respuesta</th>

    </tr>
    </thead>
    <tbody class="justify-content-around align-items-center text-center my-auto">
    <?php
    $x=0;

    for($x=0 ;$x<count($resultados) ;$x++) {


        for($i=0 ;$i<count($resultados[$x]) ;$i++) {
            echo'<tr>';
            echo '<td class="col-5 col-auto">
             <h5>' . $resultados[$x][$i]["comentario"]["mensaje"] . '</h5>
             
             </td>';

            echo '<td><h6>'.$resultados[$x][$i]["comentario"]["fecha"].'</h6></td>';
            echo '<td><h5>'.$publicaciones[$x]["titulo"].'</h5></td>';
            if (!empty($resultados[$x][$i]["respuesta"])) {
                echo '<td id="div2" class="div2 col-9 col-auto ">
             
             <h5>' . $resultados[$x][$i]["respuesta"]["mensaje"] . '</h5>
            
             ';

                echo '</td>';
            }else {

                $idComentario=  $resultados[$x][$i]["comentario"]["id"];
                $idProducto= $publicaciones[$x]["id_Producto"];


                echo '<td><button onclick="pasarDatos(' . $idComentario.','.$idProducto.')" type="button" class="btn btn-outline-primary"  data-toggle="modal"
            data-target="#exampleModalCenter"  >Responder</button></td>';
              
                 echo '<tr>';
            }
        }
    }
    ?>
    </tbody>

</table>

<input type="hidden" id="idVendedor" value="<?php echo $_SESSION["logueado"];?>">
<table id="tabla2">
</table>





</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">contesta el comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <div class="d-none alert-danger p-1 rounded justify-content-around error" id="error">
                <i class="fa fa-exclamation-circle"></i>
                <small class="text-left"></small>
                </div>

                <div>
                    <label for="comentario" class="mt-4" >Respuesta</label>
                    <textarea class="form-control" rows="3" name="comentario" id="respuesta" placeholder="Escriba aqui..."></textarea>
                </div>

                <input type="hidden" id="idComentario" name="idComentario" value="">
                <button class="btn btn-primary" id="enviar" >Enviar</button>
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