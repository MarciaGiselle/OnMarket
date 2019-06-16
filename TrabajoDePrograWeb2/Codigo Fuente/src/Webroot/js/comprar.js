
var confirmar = $("#confirmar");
var total = $('#total');

confirmar.click(function () {
alert("entro al js ");
        var obj = {};
       obj.total= $('#total').val();
        llamadaAjax(pathCompra, JSON.stringify(obj), true, "loginExitoso", "loginFallido");

});

function loginExitoso(dummy) {
    alertify.alert("Mi Compra", "Compra exitosa");
}

function loginFallido(err) {

    alertify.alert("Mi Compra", "mal");
}
