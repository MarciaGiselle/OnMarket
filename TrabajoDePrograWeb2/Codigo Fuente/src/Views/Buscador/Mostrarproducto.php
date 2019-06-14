
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
         </div>
            <form action="<?php echo getBaseAddress() . "Usuario/comprar" ?>" method="POST">
             <input class="btn btn-primary" type="reset" value="Cancelar">
            <input class="btn btn-primary" type="submit" value="Confirmar">
            </form>
    </div>
    </div>
</div>
</div>

</body>