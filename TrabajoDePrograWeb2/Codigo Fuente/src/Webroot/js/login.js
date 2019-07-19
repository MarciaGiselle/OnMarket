const regexLetrasYNumeros2 = /^[0-9a-zA-Z]+$/;

var inputName = $('#inputName');
var inputPass = $('#inputPass');
var ingresar = $("#ingresar");

function validarName() {
    var validacion = false;
    var name = inputName.val();
    if(name === null || name.length === 0 || name === "") {
        $("#errorNombre").removeClass("d-none").addClass("d-flex").find("small").text("Ingrese su nombre");
        $("#errorNombre").fadeIn("slow");
    } else if(!regexLetrasYNumeros2.test(name)) {
        $("#errorNombre").removeClass("d-none").addClass("d-flex").find("small").text("Deben ser letras y numeros");
        $("#errorNombre").fadeIn("slow");
    } else {


        validacion = true;
    }

    return validacion;
}

function validarPassword() {
    var validacion = false;
    var pass = inputPass.val();

    if (pass === null || pass.length === 0 || pass === "") {
        $("#errorPass").removeClass("d-none").addClass("d-flex").find("small").text("Contraseña Invalida");
        $("#errorPass").fadeIn("slow");
    } else if(!regexLetrasYNumeros2.test(pass)) {
        $("#errorPass").removeClass("d-none").addClass("d-flex").find("small").text("Deben ser letras y numeros");
        $("#errorPass").fadeIn("slow");

    } else {

        validacion = true;
    }
    return validacion;
}

ingresar.click(function () {

    if(validarName()){
        $(".error").fadeOut();
        $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
    }

    var validacion = validarName() && validarPassword();

    if(validacion) {
        $("input").prop("disabled", true);
        ingresar.prop("disabled", true);
        var obj = {};
        obj.nombre = inputName.val();
        obj.password = inputPass.val();
        llamadaAjax(pathLoguear, JSON.stringify(obj), true, "loginExitoso", "loginFallido");
    }
});

function loginExitoso(rol) {
    var rolUser = JSON.parse(JSON.stringify(rol));
    if(rolUser == 2){
        window.location.href = pathHome;
    }else{
        window.location.href = pathAdmin;
    }

}

function loginFallido(err) {
    $("input").prop("disabled", false);
    ingresar.prop("disabled", false);
    alertify.alert("Error de Logueo", err);
}

