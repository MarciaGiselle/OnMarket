<script>
    const pathCarrito = "<?php echo getBaseAddress() . "Carrito/agregarAlCarrito"; ?>";

</script>
<link rel="stylesheet" href="<?php echo getBaseAddress() . "Webroot/css/estrellasAlMostrar.css" ?>">

<body>
<?php

if(isset($_SESSION["logueado"])){

    include_once ("navLogueado.php") ;
}else{
    include_once ("navNoLogueado.php");
}
?>


<div class="container">
    <div class="row">
        <div class="col col-md-7">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">

                    <?php
                    $tope = count($imagen);

                    for ($i = 0; $i < $tope; $i++) {
                        $img = $imagen[$i]["nombre"];
                        if($i!=0){
                            echo '<div class="carousel-item ">
                                        <img class="d-block w-100" src="../Webroot/imgCargadas/' . $img . ' " alt="First slide">
                                      </div>';
                        }else {

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
                <h3 class="card-title"><?php echo $resultado["nombre"]; ?></h3>
                <h4 class="card-subtitle mb-1 text-muted">$<?php echo $resultado["precio"]; ?></h4>
                <hr>
                <label class="text-secondary d-inline">Cantidad disponible:</label>
                <h5> <?php echo $resultado["cantidad"]; ?></h5>

                <label class="text-secondary d-inline" for="descripcion">Descripción:</label>
                <h6 id="descripcion"><?php echo $resultado["descripcion"]; ?></h6>
              <div>
                <h6>Metodo de entrega</h6>

                <?php

                          if(count($entrega)==1){
                              echo '  <input  type="radio" name="entrega" value="'.$entrega[0]["idEntrega"].'" checked >'.$entrega[0]["descripcion"];
                          }else {
                              echo '  <input  type="radio" name="entrega" id="entrega"  value="' . $entrega[0]["idEntrega"] . '" >' . $entrega[0]["descripcion"];
                              echo '  <input  type="radio" name="entrega" id="entrega"  value="' . $entrega[1]["idEntrega"] . '">' . $entrega[1]["descripcion"];
                          }


                ?>

                <div class="d-none alert-danger p-1 rounded form-group col-md-4 error" id="errorTerminos">
                    <i class="fa fa-exclamation-circle error"></i><br>
                    <small class="text-left"></small>
                </div>

            </div>

                <hr>
                <label class="text-secondary" for="vendedor">Vendedor:</label>
                <h6  class="d-inline-block"  id="vendedor"><?php echo $nombreVendedor[0]." ".$nombreVendedor[1]; ?></h6>
<br>
                <label class="text-secondary" for="tipoVendedor">Calificación:</label>
                <h6  class="d-inline-block" id="tipoVendedor"><?php echo $tipoVendedor[0]; ?></h6>

                <?php
                if($tipoVendedor[1]==1){
                echo    '<div class="valoracion" >

                <input class="d-none" id="radio3" type="radio" name="estrellas" value="3" disabled>
                <label class="my-0" for="radio3"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio4" type="radio" name="estrellas" value="2" disabled>
                <label class="my-0" for="radio4"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio5" type="radio" name="estrellas" value="1" checked disabled>
                <label class="my-0" for="radio5"> <i class="far fa-star fa-2x"></i></label>

                </div>';
                }elseif ($tipoVendedor[1]==2){
    echo'<div class="valoracion" >

                <input class="d-none" id="radio3" type="radio" name="estrellas" value="3" disabled>
                <label class="my-0" for="radio3"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio4" type="radio" name="estrellas" value="2" checked disabled>
                <label class="my-0" for="radio4"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio5" type="radio" name="estrellas" value="1" disabled>
                <label class="my-0" for="radio5"> <i class="far fa-star fa-2x"></i></label>

                </div>';}
                else{
                    echo'<div class="valoracion" >

                <input class="d-none" id="radio3" type="radio" name="estrellas" value="3" checked disabled>
                <label class="my-0" for="radio3"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio4" type="radio" name="estrellas" value="2"  disabled>
                <label class="my-0" for="radio4"> <i class="far fa-star fa-2x"></i></label>

                <input class="d-none" id="radio5" type="radio" name="estrellas" value="1" disabled>
                <label class="my-0" for="radio5"> <i class="far fa-star fa-2x"></i></label>

                </div>';
                }
                ?>


<hr>
                <label class="text-secondary mt-2" for="id">Unidades a comprar:</label>
                <input class="col-md-4 rounded d-block" type="number" value="1" name="id" id="cantidad">


            </div>


        </div>


    </div>
    <div class="row">
        <div class="col">
            <?php
            include_once ("mapa.php");

            ?>

        </div>
        <div class="col">
            <input type="hidden" name="idVendedor" id="idVendedor" value="<?php echo $idVendedor; ?>">
            <input type="hidden" id="idProducto" name="idProducto" value="<?php echo $resultado["id"]; ?>">

            <input class="btn btn-primary mt-5 mr-2" type="reset" value="Cancelar">
            <button class="btn btn-primary mt-5" id="agregar">Agregar Al carrito</button>
        </div>

    </div>

</div>

<div class="container ">
<?php
    $tope="";
    if(count($productosRelacionados)>5){
        $tope=5;
    }else{
        $tope=count($productosRelacionados);
    }
echo '<div class="card-group">';
    for($i = 0; $i <$tope; $i++){

     echo'   <div class="card">
    <img class="card-img-top" src="../Webroot/imgCargadas/'.$productosRelacionados[$i]["imagen"][0]["nombre"].'" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">'.$productosRelacionados[$i]["prod"][0]["nombre"].'</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>';
     
    }
  

?>

</div>


</body>
<script src="<?php echo getBaseAddress() . "Webroot/js/agregarAlCarrito.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/slideDeProductos.js" ?>"></script>


