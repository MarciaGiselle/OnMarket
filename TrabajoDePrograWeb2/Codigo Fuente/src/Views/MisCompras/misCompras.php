<script>
    const pathValorar = "<?php echo getBaseAddress() . "usuario/valorar"; ?>";
</script>
<link rel="stylesheet" href="<?php echo getBaseAddress() . "Webroot/css/estrellas.css" ?>">


<?php

if(isset($_SESSION["logueado"])){

    include_once ("navLogueado.php") ;
}else{
    include_once ("navNoLogueado.php");
}
?>

<body>
<h3 class="text-primary text-center mt-4 mb-3">Tus compras</h3>
<div class="container-fluid mb-5">
    <table class=" table table-hover text-center mt-4 mb-2">
        <thead>
        <tr class="font-weight-bold">
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Fecha</th>
            <th scope="col">Número de tarjeta</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Valorá al vendedor</th>
            <th scope="col">estado</th>


        </tr>
        </thead>

        <tbody id="cuadro" class="justify-content-around align-items-center text-center my-auto">
        <?php
        $total = 0;
        $tope = count($misCompras);
        if ($tope > 0) {
            for ($i = 0; $i < $tope; $i++) {
                $nro = $i + 1;
                $idProducto= $misCompras[$i]["prod"]["id"];
                echo '<tr>
        <th scope="row">' . $nro . '</th>
        <td> ' . $misCompras[$i]["prod"]["nombre"] . '  </td>
        <td> ' . $misCompras[$i]["compra"]["cantidad"] . '  </td>
        <td> ' . $misCompras[$i]["compra"]["fecha"] . ' </td>
        <td> ' . $misCompras[$i]["tarjeta"]["numero"] . '  </td>
        <td> ' . $misCompras[$i]["vendedor"]["userName"] . '  </td>
        <td> ' . $misCompras[$i]["estado"] . '  </td>
       

        <td>';
                    if($misCompras[$i]["estado"]===1){
                        echo '<button onclick="pasarId('.$idProducto.')" type="button" class="btn btn-primary ml-2 " data-toggle="modal"
            data-target="#exampleModalCenter"  >Valorar</button>';
                    }else{
                        echo '<button onclick="pasarId('.$idProducto.')" type="button" class="btn btn-primary ml-2" data-toggle="modal"
            data-target="#exampleModalCenter" id="'.$idProducto.'" disabled>Valorar</button>';
                    };
                    echo '
        

        </td> 
        </tr>  ';

            }
            echo '</tbody>
    </table>
</div>';
        }else{

            echo  '
               <div class="container">
                 <div class="alert d-flex alert-danger p-1 align-items-center rounded text-center justify-content-center mb-5" role="alert" >
                        <i class="fa fa-exclamation-circle fa-2x mr-2 "></i>
                        <h5 class="text-center mb-0">No has realizado ninguna compra</h5>
                   </div>
                 </div>';}
        ?>



<!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Valorá al vendedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <label>Seleccioná un puntaje</label>


                        <div class="valoracion" >

                            <input class="d-none" id="radio1" type="radio" name="estrellas" value="5">
                            <label class="my-0" for="radio1"><i class="far fa-star fa-2x"></i></label>

                            <input class="d-none" id="radio2" type="radio" name="estrellas" value="4">
                            <label class="my-0" for="radio2"> <i class="far fa-star fa-2x"></i></label>

                            <input class="d-none" id="radio3" type="radio" name="estrellas" value="3">
                            <label class="my-0" for="radio3"> <i class="far fa-star fa-2x"></i></label>

                            <input class="d-none" id="radio4" type="radio" name="estrellas" value="2">
                            <label class="my-0" for="radio4"> <i class="far fa-star fa-2x"></i></label>

                            <input class="d-none" id="radio5" type="radio" name="estrellas" value="1">
                            <label class="my-0" for="radio5"> <i class="far fa-star fa-2x"></i></label>

                </div>


                        <div>
                            <label for="comentario" class="mt-4" >Dejanos tu comentario</label>
                            <textarea class="form-control" rows="3" name="comentario" id="comentario" placeholder="Opiniones, cosas positivas, cosas negativas."></textarea>
                        </div>

                        <input type="hidden" id="idValorado" name="idValorado" value="">
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

    <script src="<?php echo getBaseAddress() . "Webroot/js/valoracion.js" ?>"></script>
    <script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>


    <!-- Footer -->
    <footer class="bg-primary page-footer font-small blue pt-4">

        <!-- Copyright -->
        <div class="bg-secondary text-dark footer-copyright text-center py-3">© 2019 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/education/bootstrap/"> OnMarket.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    </body>
