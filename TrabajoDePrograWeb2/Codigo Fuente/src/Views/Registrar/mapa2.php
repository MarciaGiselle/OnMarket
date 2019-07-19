
<div id="mapa-geocoder" class="mapa" style="width: 100%; height: 626.257px; position: relative; overflow: hidden;""></div>


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
</div>

<script src="<?php echo getBaseAddress() . "Webroot/js/mapaRegistrar.js" ?>"></script>
