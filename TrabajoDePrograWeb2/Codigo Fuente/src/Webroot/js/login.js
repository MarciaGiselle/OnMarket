const regexEmail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
const regexLetrasYNumeros = /^[0-9a-zA-Z]+$/;

var inputName = $('#inputName');
var inputPass = $('#inputPass');
var ingresar = $("#ingresar");
var errorName = $("#errorName");

function validarEmailOrNick() {
    var validacion = false;
    var name = inputName.val();

    if(name === null || name.length === 0 || name === "") {
        errorName.fadeIn("slow");
    } else if(!regexEmail.test(name) && !regexLetrasYNumeros.test(name)) {
        errorName.fadeIn("slow");
    } else {
        validacion = true;
    }

    return validacion;
}

function validarPassword() {
    var validacion = false;
    var pass = inputPass.val();

    if (pass === null || pass.length === 0 || pass === "") {
        $("#errorPass").fadeIn("slow");
        return false;
    } else if(pass.length < 6 || pass.length > 15 || !regexLetrasYNumeros.test(pass)) {
        $("#errorPass2").fadeIn("slow");
    } else {
        validacion = true;
    }

    return validacion;
}

ingresar.click(function () {

    $(".error").fadeOut();

    var validacion = validarEmailOrNick() && validarPassword();

    if(validacion) {
        $("input").prop("disabled", true);
        ingresar.prop("disabled", true);
        var obj = {};
        obj.emailOrNick = inputName.val();
        obj.password = inputPass.val();
        const pathLoguear= "<?php getBaseAdress(). "Usuario/login" ; ?>";
        llamadaAjax(pathLoguear, JSON.stringify(obj), true, "loginExitoso", "loginFallido");
    }
});

function loginExitoso(dummy) {
    alert("exitoso");
   /* window.location.href = pathHome;*/
}

function loginFallido(err) {
    alert("error");
    /*$("input").prop("disabled", false);
    ingresar.prop("disabled", false);
    alertify.alert("Error de Logueo", err);*/
}