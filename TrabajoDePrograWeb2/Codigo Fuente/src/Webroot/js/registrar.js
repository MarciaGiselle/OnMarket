const regexLetrasYNumeros = /^[0-9a-zA-Z]+$/;
const regexNumeros = /^[0-9]+/;
const regexLetras = /[A-Za-z]+/;
const regexCorreo = /^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/;

var inputName = $('#name');
var inputApellido = $('#apellido');
var inputCorreo = $("#correo");
var inputCuit =$("#cuit");
var inputNombreUsuario = $("#nombreUsuario");
var inputPass = $("#pass");
var inputPass2 = $("#pass2");
var inputSexo = $("#sexo");
var inputTerminos = $("#terminos");


//falta el de terminos y condiciones

function validarCuit() {

    var validacion = false;
    var cuit = inputCuit.val();

    if(cuit === null || cuit.length === 0 || cuit === "") {
        $("#errorCuit").removeClass("d-none").addClass("d-flex").find("small").text("cuit vacio");
        $("#errorCuit").fadeIn("slow");

    } else if(!regexNumeros.test(cuit)) {

        $("#errorCuit").removeClass("d-none").addClass("d-flex").find("small").text("el cuit deben ser solo numeros");
        $("#errorCuit").fadeIn("slow");

    } else {
        $("#errorCuit").removeClass("d-flex").addClass("d-none");

        validacion = true;
    }
    return validacion;
}

function validarTerminos() {

    var validacion = false;

    var terminos = document.getElementById('terminos').checked;

    if(terminos ===false){
        $("#errorTerminos").removeClass("d-none").addClass("d-flex").find("small").text("acepte los terminos");
        $("#errorTerminos").fadeIn("slow");


    } else {
        $("#errorTerminos").removeClass("d-flex").addClass("d-none");

        validacion = true;
    }

    return validacion;
}



function validarSexo() {

    var validacion = false;
    var sexo = inputSexo.val();

    if(sexo === null || sexo.length === 0 || sexo === "") {
        //  errorName.fadeIn("slow");

    } else {

        validacion = true;
    }

    return validacion;
}

function validarPass() {

    var validacion = false;
    var pass = $("#pass").val();

    if(pass === null || pass.length === 0 || pass === "") {
        $("#errorContraseña").removeClass("d-none").addClass("d-flex").find("small").text("contraseña vacio");
        $("#errorContraseña").fadeIn("slow");

    } else if(!regexLetrasYNumeros.test(pass)) {
        $("#errorContraseña").removeClass("d-none").addClass("d-flex").find("small").text("contraseña invalida");
        $("#errorContraseña").fadeIn("slow");

    } else {

        $("#errorContraseña").removeClass("d-flex").addClass("d-none");

        validacion = true;
    }

    return validacion;
}

function validarNombre() {

    var validacion = false;
    var name = $("#name").val();


    if(name === null || name.length === 0 || name === "") {
        $("#errorName").removeClass("d-none").addClass("d-flex").find("small").text("nombre vacio");
        $("#errorName").fadeIn("slow");

    } else if(!regexLetras.test(name)) {
        $("#errorName").removeClass("d-none").addClass("d-flex").find("small").text("nombre invalido");
        $("#errorName").fadeIn("slow");
    } else {

        $("#errorName").removeClass("d-flex").addClass("d-none");
        validacion = true;
    }

    return validacion;
}

function validarApellido() {

    var validacion = false;
    var apellido = inputApellido.val();

    if(apellido === null || apellido.length === 0 || apellido === "") {
        $("#errorApellido").removeClass("d-none").addClass("d-flex").find("small").text("apellido vacio");
        $("#errorApellido").fadeIn("slow");

    } else if(!regexLetras.test(apellido)) {
        $("#errorApellido").removeClass("d-none").addClass("d-flex").find("small").text("apellido invalido");
        $("#errorApellido").fadeIn("slow");

    } else {
        $("#errorApellido").removeClass("d-flex").addClass("d-none");

        validacion = true;
    }

    return validacion;
}




function validarNombreUsuario() {

    var validacion = false;
    var nombreUsuario = inputNombreUsuario .val();

    if(nombreUsuario  === null || nombreUsuario .length === 0 || nombreUsuario  === "") {
        $("#errorNombreUsuario").removeClass("d-none").addClass("d-flex").find("small").text("NombreUsuario vacio");
        $("#errorNombreUsuario").fadeIn("slow");

    } else if(!regexLetrasYNumeros.test(nombreUsuario )) {
        $("#errorNombreUsuario").removeClass("d-none").addClass("d-flex").find("small").text("NombreUsuario invalido");
        $("#errorNombreUsuario").fadeIn("slow");

    } else {

        $("#errorNombreUsuario").removeClass("d-flex").addClass("d-none");
        validacion = true;
    }

    return validacion;
}

function validarCorreo() {

    var validacion = false;
    var correo = inputCorreo.val();

    if(correo === null || correo.length === 0 || correo === "") {
        $("#errorCorreo").removeClass("d-none").addClass("d-flex").find("small").text("Correo invalido");
        $("#errorCorreo").fadeIn("slow");

    } else if(!regexCorreo.test(correo)) {
        $("#errorCorreo").removeClass("d-none").addClass("d-flex").find("small").text("Correo invalido");
        $("#errorCorreo").fadeIn("slow");
    } else {

        $("#errorCorreo").removeClass("d-flex").addClass("d-none");
        validacion = true;
    }

    return validacion;
}


$("#registrar").click(function () {


    var validacion = validarTerminos()&& validarCuit() && validarNombre() && validarApellido() && validarNombreUsuario() &&  validarCorreo()&&  validarSexo()&&  validarPass();

    if(validacion) {
alert("valido");
        var obj = {};
        obj.nombre = $("#name").val();
        obj.apellido=$("#apellido").val();
        obj.pass = $("#pass").val();
        obj.pass2 = $("#pass2").val();
        obj.cuit= $("#cuit").val();
        obj.correo=$("#correo").val();
        obj.nombreUsuario=$("#nombreUsuario").val();
        obj.sexo=$("#sexo").val();
        obj.terminos=$("#terminos").val();

        llamadaAjax(pathRegistrar, JSON.stringify(obj), true, "loginExitoso", "loginFallido");
    }
});

function loginExitoso(dummy) {
alert("registro bien ");
    window.location.href = pathHome;
}

function loginFallido(err) {
    alert("registro mal ");

    $("input").prop("disabled", false);

    alertify.alert("Error de Logueo", err);
}



