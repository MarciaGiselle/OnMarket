const regexLetras = /[A-Za-z]+/;

var inputBuscador = $('#buscador');
var boton = $('#btnBuscar');

function validarBusqueda() {

    var validacion = false;
    var busqueda = inputBuscador.val();

    if(busqueda === null || busqueda.length === 0 || busqueda === "") {
    } else if(!regexLetras.test(busqueda)) {

    } else {

        validacion = true;
    }
    return validacion;
}

boton.click(function () {
    // $(".error").fadeOut();

    var validacion = validarBusqueda();

    if(validacion) {
        $("input").prop("disabled", true);
     	boton.prop("disabled", true);
        var obj = {};
        obj.nombreProducto = inputBuscador.val();
        llamadaAjax(pathBusqueda, JSON.stringify(obj), true, "busquedaExitosa", "busquedaFallida");
    }
});

function busquedaExitosa(resultados){
    //alertify.alert(JSON.stringify(resultados));
    var datos = JSON.parse(JSON.stringify(resultados));
    var tabla = $('#tabla');

    console.log(datos.length);
   tabla.append(
       '<thead>'+'<tr>'+
       '<th text-align="center">codigo</th>'+
       '<th text-align="center">nombre</th>' +
       '<th text-align="center" >cantidad</th>'+
       '</tr>'+
       '</thead>');
   for (i = 0; i < datos.length; i++){

        $("#tabla").append('<tr>' +
            '<td align="center" style="dislay: none;">' + datos[i].idProducto + '</td>'+
            '<td align="center" style="dislay: none;">' + datos[i].nombre + '</td>'+
            '<td align="center" style="dislay: none;">' + datos[i].cantidad+ '</td>'+'</tr>');
    }
    $("input").prop("disabled", false);
}

function busquedaFallida(err) {
    $("input").prop("disabled", false);
    boton.prop("disabled", false);
    alertify.alert("Error de busqueda", err);
}
