<style>
    label {
        color: grey;
    }

    .valoracion {
        direction: rtl; /* right to left */
        unicode-bidi: bidi-override; /* bidi de bidireccional */
    }

    div.valoracion label:hover {
        color: orange;
    }

    div.valoracion input[type="radio"]:checked ~ label {
        color: orange;
    }
</style>

<h5 class="text-primary text-center ">Tus compras</h5>
<div class="container-fluid">
    <table class=" table table-hover text-center mt-4">
        <thead>
        <tr class="font-weight-bold">
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Fecha</th>
            <th scope="col">Número de tarjeta</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Valorá al vendedor</th>


        </tr>
        </thead>

        <tbody class="justify-content-around align-items-center text-center my-auto">
        <?php
        $total = 0;
        $tope = count($misCompras);
        if ($tope > 0) {
            for ($i = 0; $i < $tope; $i++) {
                $nro = $i + 1;

                echo '
          <tr>

        <th scope="row">' . $nro . '</th>
        <td> ' . $misCompras[$i]["prod"]["nombre"] . '  </td>
        <td> ' . $misCompras[$i]["compra"]["cantidad"] . '  </td>
        <td> ' . $misCompras[$i]["compra"]["fecha"] . ' </td>
        <td> ' . $misCompras[$i]["tarjeta"]["numero"] . '  </td>
        <td> ' . $misCompras[$i]["vendedor"]["userName"] . '  </td>

        <td>
        
        <!--Valoracion -->

                <form method="post" action="' . getBaseAddress() . 'Usuario/valorarPublicacion' . '"  method="post">

                <div class="valoracion">
                     <div class="text-center align-items-center justify-content-around mx-auto">
                    
                    <input type="hidden" name="vendedor" value="' . $misCompras[$i]["vendedor"]["id"] . '">
                    <input type="submit" class="btn btn-primary ml-2" id="enviarValoracion" value="Valorar">
                     
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
                                </div>

                               </form>

                                </td> 

                </tr>



        ';
            }
        }
        ?>

        </tbody>

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
