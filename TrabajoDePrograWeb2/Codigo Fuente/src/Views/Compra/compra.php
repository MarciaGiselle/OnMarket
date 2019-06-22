<script>
    const pathCompra= "<?php echo getBaseAddress(). "Usuario/compra" ; ?>";

</script>
<body>
<?php

if(isset($_SESSION["logueado"])){

    include_once ("navLogueado.php") ;
}else{
    include_once ("navNoLogueado.php");
}
?>



                <h2>Complete los datos de su tarjeta</h2>

     <label>Numero de tarjeta</label>
     <input type="text" id="numero" placeholder="1235 1259 0065 4569">

    <label>Codigo de seguridad</label>
    <input type="password" id="codigo" placeholder="******">

    <label>Fecha de vencimiento</label>
    <input type="date" id="fecha" placeholder="">

    <input type="hidden" id="total" value="<?php echo $total;?>">


                <button class="btn btn-primary" id="confirmar"  >Confirmar</button>

</body>


<script src="<?php echo getBaseAddress() . "Webroot/js/comprar.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>