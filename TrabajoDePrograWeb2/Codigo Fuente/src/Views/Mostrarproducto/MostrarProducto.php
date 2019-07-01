<script>
    const pathCarrito = "<?php echo getBaseAddress() . "Carrito/agregarAlCarrito"; ?>";

</script>
<body>
<?php

if(isset($_SESSION["logueado"])){

    include_once ("navLogueado.php") ;
}else{
    include_once ("navNoLogueado.php");
}
?>

<div class="container mt-4">
    <div class="row">

        <div class="col-md-6">

            <?php

            $tope = count($imagen);

            for ($i = 0; $i < $tope; $i++) {

                $img = $imagen[$i]["nombre"];

                echo '<img class="rounded float-left" width="90%" height="30%" src="../Webroot/imgCargadas/' . $img . ' " alt="' . $img . '">';
            }
            ?>

        </div>

        <div class="col-md-4">
            <div class="card-body">
                <h3 class="card-title"><?php echo $resultado["nombre"]; ?></h3>
                <h4 class="card-subtitle mb-1 text-muted">$<?php echo $resultado["precio"]; ?></h4>
                <hr>
                <label class="text-secondary d-inline">Cantidad disponible:</label>
                <h5> <?php echo $resultado["cantidad"]; ?></h5>

                <label class="text-secondary d-inline" for="descripcion">Descripción:</label>
                <h6 id="descripcion"><?php echo $resultado["descripcion"]; ?></h6>

                <label class="text-secondary mt-2" for="id">Unidades a comprar:</label>
                <input class="col-md-4 rounded d-block" type="number" value="1" name="id" id="cantidad">


                    <?php
                    include_once ("mapa.php");

                    ?>




                <input class="btn btn-primary mt-5 mr-2" type="reset" value="Cancelar">
                <button class="btn btn-primary mt-5" id="agregar">Agregar Al carrito</button>
            </div>


            <input type="hidden" name="id" id="id" value="<?php echo $resultado["id"]; ?>">
        </div>
    </div>
</div>

<div class="container mt-5">
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


