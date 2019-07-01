<!doctype html>
<html>
<head>

<style>

</style>
</head>
<body>

<div class="buscador">
	<h5>Ingrese una dirección</h5>
    <input type="text" id="direccion">
    <div class="btn btn-primary" id="buscar">Buscar</div>
</div>

<div id="mapa-geocoder" class="mapa" style="width:140%;"></div>


<script>
$(document).ready(function() {
	$(window).on("load resize", function() {
		var alturaBuscador = $(".buscador").outerHeight(true),
			alturaVentana = $(window).height(),
			alturaMapa = alturaVentana - alturaBuscador;
		
		$("#mapa-geocoder").css("height", alturaMapa+"px");
	});
});
</script>

<script src="<?php echo getBaseAddress() . "Webroot/js/mapaRegistrar.js" ?>"></script>
</body>
</html>