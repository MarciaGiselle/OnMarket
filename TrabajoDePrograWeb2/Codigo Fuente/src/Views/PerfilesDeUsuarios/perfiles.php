<body>

<div class="container">


    <form  class="input-group mt-5 mb-5" action="<?php echo getBaseAddress() . "PerfilesDeUsuarios/buscarUsuario" ?>" method="post">
        <input   class="form-control" type="search" name="nombre" placeholder="busque un usuario por su nombre">

            <input class=' btn btn-primary ' type="submit" value="buscar">
       </div>

    </form>



</div>
<table class=" table table-hover text-center mt-4">
    <tr>
        <td>Id</td>
        <td>Nombre de usuario</td>
        <td>Publicaciones</td>
        <td>Compras</td>
        <td>Estado</td>
    </tr>

<?php
$tope=count($usuarios);
for($i=0;$i< $tope;$i++){
   echo "<tr>
     
   <th scope='row'>#" . $usuarios[$i]["id"] . "</th>
    <td>".$usuarios[$i]["userName"]."<br>
     </td>
    
   
    
    
    </td>
    
    
    <td> 
        <form method='post' action='".getBaseAddress() . 'PublicacionesAdmin/verPublicaciones' ."' >
         
        <input type='hidden' name='id_user' value='".$usuarios[$i]["id"]."'>
        <input class='btn btn-lg btn-primary' type='submit' value='Ver'> 
        </form>                            
    </td>
    
    <td> 
       <form method='post' action='".getBaseAddress() . 'ComprasAdmin/verComprasComoAdmin' ."' >
        <input type='hidden' name='id_user' value='".$usuarios[$i]["id"]."'>
        <input class='btn btn-lg btn-primary' type='submit' value='Ver'> 
        </form>                            
    </td>";

   if($usuarios[$i]["estado"]==1){
       echo "<td> 
       <form method='post' action='".getBaseAddress() . 'Bloquear/Bloquear' ."' >
        <input type='hidden'  name='id_user' value='".$usuarios[$i]["id"]."'>
        <input  class='btn btn-lg btn-primary' type='submit' value='Bloquear'> 
        </form>                            
    </td>";
   }else{
       echo "<td> 
       <form method='post' action='".getBaseAddress() . 'Desbloquear/desbloquear' ."' >
        <input type='hidden'  name='id_user' value='".$usuarios[$i]["id"]."'>
        <input class='btn btn-lg btn-primary' type='submit' value='Desbloquear'> 
        </form>                            
    </td>";
   }



   
   
   
   
    echo "</tr>";


}
?>

</table>




</body>