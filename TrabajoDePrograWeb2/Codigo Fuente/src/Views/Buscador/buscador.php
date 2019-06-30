<script>
    const pathBusqueda = "<?php echo getBaseAddress() . "Buscador/buscarProducto"; ?>";
    const pathMostrarResultados = "<?php echo getBaseAddress() . "Buscador/mostrarResultados"; ?>";
    const pathLoguear = "<?php echo getBaseAddress() . "Usuario/login"; ?>";
</script>


<body>
<?php

if(isset($_SESSION["logueado"])){

    include_once ("navLogueado.php") ;
}else{
    include_once ("navNoLogueado.php");
}
?>
<!-- Buscador-->
<br>

<div class="container">
    <h3 class="text-primary text-center mt-3">Qué estás buscando?</h3>

    <div class="input-group mt-5 mb-5">
        <input type="search" class="form-control" placeholder="Escribe algo que desees encontrar" id="buscador">
        <div class="input-group-append">
            <span type="submit" class="input-group-text" id="btnBuscar"><i class="fa fa-search"></i></span>
        </div>

        <div class='container d-none' id="resultados">
            <form action="<?php echo getBaseAddress() . "MostrarProducto/verProducto" ?>" method="post">
                <table id="tablaBuscador" class='table table-hover text-center mt-4'>
                    <thead>
                    <tr>
                        <th class="text-primary ">RESULTADOS ENCONTRADOS</th>
                    </tr>
                    </thead>

                </table>
            </form>
        </div>
    </div>
</div>


<!-- Footer-->
<footer class="bg-primary page-footer font-small blue pt-4">


    <div class="bg-secondary text-dark footer-copyright text-center py-3">© 2019 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/education/bootstrap/"> OnMarket.com</a>
    </div>


</footer>
</body>


<script src="<?php echo getBaseAddress() . "Webroot/js/buscador.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/login.js" ?>"></script>




