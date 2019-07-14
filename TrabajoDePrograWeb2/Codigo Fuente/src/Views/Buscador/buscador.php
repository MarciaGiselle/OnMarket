<script>
    const pathBusqueda = "<?php echo getBaseAddress() . "Buscador/buscarProducto"; ?>";
    const pathHome = "<?php echo getBaseAddress(). "Usuario/mostrarInicio" ; ?>";
    const pathMostrarResultados = "<?php echo getBaseAddress() . "Buscador/mostrarResultados"; ?>";
    const pathLoguear = "<?php echo getBaseAddress() . "Usuario/login"; ?>";
</script>



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
                    

                </table>
            </form>
        </div>
    </div>
</div>




<script src="<?php echo getBaseAddress() . "Webroot/js/buscador.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/utilidades.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/login.js" ?>"></script>
<script src="<?php echo getBaseAddress() . "Webroot/js/login.js" ?>"></script>




