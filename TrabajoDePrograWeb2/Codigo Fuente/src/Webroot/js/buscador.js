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
    alert(inputBuscador.val());

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

function busquedaExitosa(dummy) {
   window.location.href = pathMostrarResultados;
}

function busquedaFallida(err) {
    $("input").prop("disabled", false);
    boton.prop("disabled", false);
    alertify.alert("Error de busqueda", err);
}
