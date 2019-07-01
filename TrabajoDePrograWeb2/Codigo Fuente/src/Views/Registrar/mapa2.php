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

<script>function localizar(elemento,direccion) {
		var geocoder = new google.maps.Geocoder();

		var map = new google.maps.Map(document.getElementById(elemento), {
		  zoom: 16,
		  scrollwheel: true,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		
		geocoder.geocode({'address': direccion}, function(results, status) {
			if (status === 'OK') {
				var resultados = results[0].geometry.location,
					resultados_lat = resultados.lat(),
					resultados_long = resultados.lng();
					
				   
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
             
                 $("#lon").attr("value",resultados_long );
                  $("#lat").attr("value",resultados_lat );
			} else {
				var mensajeError = "";
				if (status === "ZERO_RESULTS") {
					mensajeError = "No hubo resultados para la dirección ingresada.";
				} else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
					mensajeError = "Error general del mapa.";
				} else if (status === "INVALID_REQUEST") {
					mensajeError = "Error de la web. Contacte con Name Agency.";
				}
				alert(mensajeError);
			}
		});
	}
	
    $.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyAiq3xISXSZYgkd9GDAOdajy4NK2d3L7dY", function() {
		$("#buscar").click(function() {
            var direccion = $("#direccion").val();
			if (direccion !== "") {
				localizar("mapa-geocoder", direccion);
			}
        });
	});
 </script>
</body>
</html>