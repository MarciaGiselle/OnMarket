<script>
    const pathCarrito= "<?php echo getBaseAddress(). "Usuario/carrito" ; ?>";

</script>


<body>
<div class="container border border-primary rounded>">
    <div class="row">
        <div class="col-sm">



            <?php

             $tope=count($imagen);

             for($i=0;$i<$tope;$i++){
             $img=$imagen[$i]["nombre"];
             echo '<img class="rounded float-left" width="500px" height="150px"src="'.$img.' " alt="'.$img.'">';
            }
            ?>
       </div>

        <div class="col-sm">
            <div class="card-body">
             <h1  class="card-title"><?php echo $nombre; ?></h1>

             <h2 class="card-subtitle mb-2 text-muted">$<?php echo $precio; ?></h2>


            <h2>cantidad disponible: <?php echo $cantidad; ?></h2>

           <h2><?php echo $descripcion; ?></h2>
                <label>Cantidad:</label>
                <input type="number" value="1" name="id" id="cantidad" >
         </div>


            <input type="hidden" name="id" id="nombre" value="<?php echo $nombre; ?>">
            <input type="hidden" name="id" id="precio" value="<?php echo $precio; ?>">

            <input type="hidden" name="id" id="id" value="<?php echo $idProducto; ?>">
             <input class="btn btn-primary" type="reset" value="Cancelar">
            <button class="btn btn-primary" id="comprar" >Agregar Al carrito</button>

    </div>
    </div>
</div>
</div>

</body>
<script src="<?php echo getBaseAddress() . "Webroot/js/carrito.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>