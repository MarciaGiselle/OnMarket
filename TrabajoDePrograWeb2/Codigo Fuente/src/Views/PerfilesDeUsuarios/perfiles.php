<body>
<?php
if(isset($_SESSION["logueado"])){

    include_once ("navLogueado.php") ;
}else{
    include_once ("navNoLogueado.php");
}

?>
<table>
    <tr>
        <td>Nombre de usuario</td>

    </tr>

<?php
$tope=count($usuarios);
for($i=0;$i< $tope;$i++){
   echo "<tr>
    <td>Usuario:".$usuarios[$i]["userName"]."<br>
     </td>
    
   
    
    
    </td>
    
    
    <td> 
        <form method='post' action='".getBaseAddress() . 'MisPublicaciones/verPublicacionesComoAdmin' ."' >
         Id:".$usuarios[$i]["id"]."
        <input type='hidden' name='id_user' value='".$usuarios[$i]["id"]."'>
        <input type='submit' value='Publicaciones'> 
        </form>                            
    </td>
    
    <td> 
       <form method='post' action='".getBaseAddress() . 'MisCompras/verComprasComoAdmin' ."' >
        <input type='hidden' name='id_user' value='".$usuarios[$i]["id"]."'>
        <input type='submit' value='Compras'> 
        </form>                            
    </td>";

   if($usuarios[$i]["estado"]==1){
       echo "<td> 
       <form method='post' action='".getBaseAddress() . 'Bloquear/Bloquear' ."' >
        <input type='hidden'  name='id_user' value='".$usuarios[$i]["id"]."'>
        <input type='submit' value='Bloquear'> 
        </form>                            
    </td>";
   }else{
       echo "<td> 
       <form method='post' action='".getBaseAddress() . 'Desbloquear/desbloquear' ."' >
        <input type='hidden'  name='id_user' value='".$usuarios[$i]["id"]."'>
        <input type='submit' value='Desbloquear'> 
        </form>                            
    </td>";
   }



   
   
   
   
    echo "</tr>";


}
?>

</table>




</body>