const regexLetras = /[A-Za-z]+/;

var inputBuscador = $('#buscador');
var boton = $('#btnBuscar');
var tabla = $('#tablaBuscador');


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
  $('#tablaBuscador').empty();
    var validacion = validarBusqueda();

    if (validacion) {
        realizarBusqueda();
    }

});

function realizarBusqueda(){
        $("input").prop("disabled", true);
     	boton.prop("disabled", true);
        var obj = {};
        obj.nombreProducto = inputBuscador.val();
        llamadaAjax(pathBusqueda, JSON.stringify(obj), true, "busquedaExitosa", "busquedaFallida");
};

function busquedaExitosa(resultados){
   var datos = JSON.parse(JSON.stringify(resultados));

    $('#resultados').removeClass('d-none');

   tabla.append(
    '<thead><tr>'+
    '<th class="text-primary">RESULTADOS ENCONTRADOS</th>'+
    '</thead>'
    );
    for (i = 0; i < datos.length; i++){
        var name= datos[i].imagen[0].nombre;
        var id = datos[i].prod[0].idProducto;

        tabla.append('<tr>' +
            '<td align="center"> '+ datos[i].prod[0].nombre + '</td>'+
            '<td align="center">' + datos[i].prod[0].precio + '</td>'+
            '<td align="center" >'+ datos[i].prod[0].descripcion+ '</td>'+
            '<td align="center" >'+ '<img height="100px" src="../Webroot/imgCargadas/'+ name +'">'+
            '<input type="submit" value="ver" id="btnVer">' +
            '</td>'+
            '</tr>'

        );
    }

    $("input").prop("disabled", false);
}

function busquedaFallida(err) {
    $("input").prop("disabled", false);
    boton.prop("disabled", false);
   alertify.alert("Error de busqueda", err);
}
