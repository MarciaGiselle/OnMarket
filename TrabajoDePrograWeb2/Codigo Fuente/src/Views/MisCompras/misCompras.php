<h5 class="text-primary text-center ">Tus compras</h5>

<table class=" table table-hover text-center mt-4">
    <thead>
    <tr class="font-weight-bold">
        <td scope="col">#</td>
        <td scope="col">Producto</td>

        <td scope="col">Fecha</td>
        <td scope="col">Valorá al vendedor</td>


        <td scope="col"></td>

    <tr>
    </thead>

    <tbody>
    <tr>
        <?php
        $total = 0;
        $tope = count($misCompras);
        if ($tope > 0) {
            for ($i = 0; $i < $tope; $i++) {
                $nro = $i + 1;

                echo '
      
        <th scope="row">' . $nro . '</th>
        <td> ' . $misCompras[$i]["idProducto"] . '  </td>
        <td> ' . $misCompras[$i]["fecha"] . ' </td>
        <td>
        
        <!--Valoracion -->

  <div class="container" id="valoracion">

                <div class="valoracion">
                <form method="post" action="' . getBaseAddress() . 'Usuario/valorarPublicacion' . '"  method="post">
                     <div class="text-center align-items-center">

                    <input class="d-none" id="radio1" type="radio" name="estrellas" value="5">
                    <label for="radio1"><i class="far fa-star fa-2x"></i></label>

                    <input class="d-none" id="radio2" type="radio" name="estrellas" value="4">
                    <label for="radio2"> <i class="far fa-star fa-2x"></i></label>

                    <input class="d-none" id="radio3" type="radio" name="estrellas" value="3">
                    <label for="radio3"> <i class="far fa-star fa-2x"></i></label>


                    <input class="d-none" id="radio4" type="radio" name="estrellas" value="2">
                    <label for="radio4"> <i class="far fa-star fa-2x"></i></label>

                    <input class="d-none" id="radio5" type="radio" name="estrellas" value="1">
                    <label for="radio5"> <i class="far fa-star fa-2x"></i></label>
                     </div>
                      </td>
                    <td>
     
                         <input type="hidden" name="idProducto" value="'. $misCompras[$i]["idProducto"] . '">

                    <input type="submit" class="btn btn-primary" id="enviarValoracion" value="Valorar">
                    </td>      
                             </form>
                </div>
     

        ';
            }
        }
        ?>
    </tr>

</table>


<style>
    label {
        color: grey;
    }

    .valoracion {
        direction: rtl; /* right to left */
        unicode-bidi: bidi-override; /* bidi de bidireccional */
    }

    div.valoracion label:hover,
    div.valoracion label:hover ~ label {
        color: orange;
    }

    div.valoracion input[type="radio"]:checked ~ label {
        color: orange;
    }
</style>
