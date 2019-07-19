<script>

    const pathCarrito = "<?php echo getBaseAddress() . "Carrito/agregarAlCarrito"; ?>";
    const pathComentarios = "<?php echo getBaseAddress() . "MostrarProducto/AgregarComentario"; ?>";

</script>
<link rel="stylesheet" href="<?php echo getBaseAddress() . "Webroot/css/estrellasAlMostrar.css" ?>">

<div class="container mt-5 ">
    <div class="row">
        <div class="col col-md-7" style="width:400px; height:300px;">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">

                    <?php
                    $tope = count($imagen);

                    for ($i = 0; $i < $tope; $i++) {
                        $img = $imagen[$i]["nombre"];
                        if ($i != 0) {
                            echo '<div class="carousel-item ">
                                        <img class="d-block w-100" src="../Webroot/imgCargadas/' . $img . ' " alt="First slide">
                                      </div>';
                        } else {

                            echo '<div class="carousel-item active">
                                        <img class="d-block w-100" src="../Webroot/imgCargadas/' . $img . ' " alt="First slide">
                                      </div>';
                        }

                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>

        </div>

        <div class="col col col-md-5">
            <div class="card-body">
                <h4 class="card-title"><?php echo $resultado["nombre"]; ?></h4>
                <h5 class="card-subtitle mb-1 text-muted">$<?php echo $resultado["precio"]; ?></h5>
                <hr>
                <label class="text-secondary d-inline">Cantidad disponible:</label>
                <h5> <?php echo $resultado["cantidad"]; ?></h5>


                <label class="text-secondary d-inline" for="descripcion">Descripción:</label>
                <h6 id="descripcion"><?php echo $resultado["descripcion"]; ?></h6>

                <div>
                    <hr>
                    <label class="text-secondary d-inline">Métodos de entrega:</label>
                    <br>

                    <?php

                    if (count($entrega) == 1) {

                        echo '<input type="checkbox" name="entrega[]" value="' . $entrega[0]["idEntrega"] . '" checked disabled>
                            <h6 class="d-inline-flex">Acordar con el vendedor</h6>';
                    } else {
                        echo '<input  type="checkbox" name="entrega[]" value="' . $entrega[0]["idEntrega"] . '" checked disabled>
                            <h6 class="d-inline-flex">Acordar con el vendedor</h6>
                             <br>
                            <input type="checkbox" name="entrega[]" value="' . $entrega[1]["idEntrega"] . '" checked disabled>
                             <h6 class="d-inline-flex">Acordar envio por correo</h6>';
                    }

                    ?>

                    <div class="d-none alert-danger p-1 rounded form-group col-md-4 error" id="errorTerminos">
                        <i class="fa fa-exclamation-circle error"></i><br>
                        <small class="text-left"></small>
                    </div>

                </div>

                <hr>
                <label class="text-secondary" for="vendedor">Vendedor:</label>
                <h6 class="d-inline-block"
                    id="vendedor"><?php echo $nombreVendedor[0] . " " . $nombreVendedor[1]; ?></h6>
                <br>
                <label class="text-secondary" for="tipoVendedor">Calificación:</label>
                <h6 class="d-inline-block" id="tipoVendedor"><?php echo $tipoVendedor[0]; ?></h6>

                <?php
                if ($tipoVendedor[1] == 1) {
                    echo '<div class="valoracion" >

                <input class="d-none" id="radio3" type="radio" name="estrellas" value="3" checked disabled>
                <label class="my-0" for="radio3"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio4" type="radio" name="estrellas" value="2"  disabled>
                <label class="my-0" for="radio4"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio5" type="radio" name="estrellas" value="1"  disabled>
                <label class="my-0" for="radio5"> <i class="far fa-star fa-2x"></i></label>

                </div>';
                } elseif ($tipoVendedor[1] == 2) {
                    echo '<div class="valoracion" >

                <input class="d-none" id="radio3" type="radio" name="estrellas" value="3" disabled>
                <label class="my-0" for="radio3"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio4" type="radio" name="estrellas" value="2" checked disabled>
                <label class="my-0" for="radio4"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio5" type="radio" name="estrellas" value="1"   disabled>
                <label class="my-0" for="radio5"> <i class="far fa-star fa-2x"></i></label>

                </div>';
                } else {
                    echo '<div class="valoracion" >

                <input class="d-none" id="radio3" type="radio" name="estrellas" value="3"  disabled>
                <label class="my-0" for="radio3"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio4" type="radio" name="estrellas" value="2"  disabled>
                <label class="my-0" for="radio4"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio5" type="radio" name="estrellas" value="1" checked disabled>
                <label class="my-0" for="radio5"> <i class="far fa-star fa-2x"></i></label>

                </div>';
                }
                ?>


                <hr>
                <label class="text-secondary mt-2" for="id">Unidades a comprar:</label>
                <input class="col-md-4 rounded d-block" type="number" value="1" name="id" id="cantidad">


                <?php
                include_once("mapa.php");

                ?>
                <div class="col pl-0">
                    <input type="hidden" name="idVendedor" id="idVendedor" value="<?php echo $idVendedor; ?>">
                    <input type="hidden" id="idProducto" name="idProducto" value="<?php echo $resultado["id"]; ?>">

                    <input class="btn btn-secondary mt-5" type="reset" value="Cancelar">
                    <button class="btn btn-primary mt-5" id="agregar">Agregar Al carrito</button>
                </div>

            </div>


        </div>


    </div>

</div>

<div class="container" id="div1">

    <div id="div3">

    </div>
</div>




<h3 class="text-primary text-center mt-4 mb-2">Sección de Comentarios</h3>

<small class="text-muted d-flex justify-content-center text-center mb-3">Ingresa un nuevo comentario</small>

<form class="container">
    <div class="row  justify-content-around">
        <div class="col col-md-12 pb-3 ">

            <textarea class="form-control" rows="3" name="descripcion" id="mensajeNuevo"
                      placeholder="Agrega un comentario público..."></textarea>
        </div>

    </div>

    <div class="row justify-content-around">
        <div class="col col-md-12">
            <input id="comentar" onclick="pasarId(null)" type="button" class="btn btn-primary d-flex float-right"
                   value="Comentar">
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 d-none alert-danger p-1 rounded  error" id="error">
            <i class="fa fa-exclamation-circle"></i>
            <small></small>
        </div>
    </div>
</form>


<div class="container " id="comentarios">

    <?php

    for ($i = 0; $i < count($resultados); $i++) {

        echo '
        <div class="row ">
      

        <div class="col col-md-8 align-self-start">
                 <div class=" alert alert-primary">
                    <h6 class="font-weight-bold">' . $resultados[$i]["usuario"]["name"] . " " . $resultados[$i]["usuario"]["lastname"] . '</h6>

                    <div class="float-right">
                         <h6>' . $resultados[$i]["comentario"]["fecha"] . '</h6>
                    </div>
                    <div>
                         <h5>' . $resultados[$i]["comentario"]["mensaje"] . '</h5>
                     </div>
                  </div>
               </div>     
             </div>';

        if (!empty($resultados[$i]["respuesta"])) {
            echo '<div id="div2" class="div2   ">
                    <div class="row justify-content-end ">
                        <div class="col-8 align-self-end">
                            <div class="alert alert-secondary ">
                                <h6 class="font-weight-bold">' . $resultados[$i]["usuario"]["name"] . " " . $resultados[$i]["usuario"]["lastname"] .'</h6>
                                <div class="float-right">
                                    <h6>' . $resultados[$i]["respuesta"]["fecha"] . '</h6>
                                </div>
                                <div>
                                    <h5>' . $resultados[$i]["respuesta"]["mensaje"] . '</h5>
                                </div>
                            </div>
                        </div>
                    </div>


 
             </div>';
        }


    }

    ?>


</div>

<hr>
<h3 class="text-primary text-center mt-4 mb-2">Productos Relacionados</h3>

<div class="container mt-4">

    <?php
    $tope = "";
    if (count($productosRelacionados) > 5) {
        $tope = 5;
    } else {
        $tope = count($productosRelacionados);
    }
    for ($i = 0; $i < $tope; $i++) {
        echo '    <div class="card d-inline-flex" style="width: 18rem;">
 <form action="'. getBaseAddress() . "MostrarProducto/verProducto". '" method="POST">
    <img class="card-img-top" src="../Webroot/imgCargadas/' . $productosRelacionados[$i]["imagen"][0]["nombre"] . '" alt="Card image cap">
    
    <div class="card-body">
    <h6 class="card-title">    ' . $productosRelacionados[$i]["prod"][0]["nombre"] . '</h6>
    <input type="hidden" value="' . $productosRelacionados[$i]["prod"][0]["id"] . '" name="id">
       <button type="submit" class="btn btn-primary">Ver</button>
        </div>
  </form>
  </div>';

    }


    ?>

</div>



<script src="<?php echo getBaseAddress() . "Webroot/js/agregarAlCarrito.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/agregarComentario.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/slideDeProductos.js" ?>"></script>


