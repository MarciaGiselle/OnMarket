const regexLetrasYNumeros = /^[0-9a-zA-Z]+$/;

function pasarId(valor) {
    $('#idValorado').val(valor);
    $("#cuadro").on("click", "button", function () {
        $(this).attr('id', 'seleccionado');
    });
}


function validarEstrellas() {
    var validacion = false;
    var star = $("input[name='estrellas']:checked").val();
    if (star === undefined) {
        $("#errorEstrellas").removeClass("d-none").addClass("d-flex").find("small").text("Debe seleccionar un puntaje");
        $("#errorEstrellas").fadeIn("slow");

    } else {
        validacion = true;
    }

    return validacion;

};


function validarComentario() {
    var validacion = false;
    var coment = $("#comentario").val();
    if (coment.length === 0 || coment === null || coment.length === "") {
        validacion = true;
    } else if (!regexLetrasYNumeros.test(coment)) {
        $("#errorComentario").removeClass("d-none").addClass("d-flex").find("small").text("Solo pueden ser letras y números");
        $("#errorComentario").fadeIn("slow");
    } else {
        validacion = true;

    }
    return validacion;
};


var enviarDatos = $('#enviarDatos');

enviarDatos.click(function () {

    if (validarEstrellas()) {
        $(".error").fadeOut();
        $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
    }

    if (validarComentario()) {
        $(".error").fadeOut();
        $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
    }

    var validacion = validarEstrellas() && validarComentario();
alert (validacion);
    if (validacion) {
        var obj = {};
        var estrellas = $("input[name='estrellas']:checked").val();
        obj.estrellas = estrellas;
        obj.idValorado = $("#idValorado").val();
        obj.comentario = $("#comentario").val();

        llamadaAjax(pathValorar, JSON.stringify(obj), true, "ValoracionExitosa", "ValoracionFallida");
    }
});

function ValoracionExitosa() {
    alertify.alert("Valoracion", "Enviada exitosamente!");
    $("#seleccionado").prop("disabled", true);
    location.reload();
}

function ValoracionFallida(err) {
    alertify.alert("Valoracion ", "fallida");
}




