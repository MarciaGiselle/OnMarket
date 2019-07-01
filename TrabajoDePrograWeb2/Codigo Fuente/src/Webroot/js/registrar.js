const regexLetrasYNumeros = /^[0-9a-zA-Z]+$/;
const regexNumeros = /^[0-9]+/;
const regexLetras = /[A-Za-z]+/;
const regexCorreo = /^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/;

var inputName = $('#name');
var lat = $('#lat');
var lon = $('#lon');
var inputApellido = $('#apellido');
var inputCorreo = $("#correo");
var inputCuit =$("#cuit");
var inputNombreUsuario = $("#nombreUsuario");
var inputPass = $("#pass");
var inputPass2 = $("#pass2");
var inputSexo = $("#sexo");
var inputTerminos = $("#terminos");


//falta el de terminos y condiciones

function validarFormatos() {

    var validacion = false;
    var cuit = inputCuit.val();
    var error=0;
    if(cuit === null || cuit.length === 0 || cuit === "") {
        $("#errorCuit").removeClass("d-none").addClass("d-flex").find("small").text("cuit vacio");
        $("#errorCuit").fadeIn("slow");
       error++;
    } else if(!regexNumeros.test(cuit)) {

        $("#errorCuit").removeClass("d-none").addClass("d-flex").find("small").text("el cuit deben ser solo numeros");
        $("#errorCuit").fadeIn("slow");
        error++;
    } else {
        $("#errorCuit").removeClass("d-flex").addClass("d-none");

        error--;
    }

    var terminos = document.getElementById('terminos').checked;

    if(terminos ===false){
        $("#errorTerminos").removeClass("d-none").addClass("d-flex").find("small").text("acepte los terminos");
        $("#errorTerminos").fadeIn("slow");
        error++;

    } else {
        $("#errorTerminos").removeClass("d-flex").addClass("d-none");
        error--;

    }


    var sexo = inputSexo.val();

    if(sexo === null || sexo.length === 0 || sexo === "") {
        //  errorName.fadeIn("slow");
        error++;
    } else {
        error--;

    }


    var pass = $("#pass").val();

    if(pass === null || pass.length === 0 || pass === "") {
        $("#errorContraseña").removeClass("d-none").addClass("d-flex").find("small").text("contraseña vacio");
        $("#errorContraseña").fadeIn("slow");
        error++;
    } else if(!regexLetrasYNumeros.test(pass)) {
        $("#errorContraseña").removeClass("d-none").addClass("d-flex").find("small").text("contraseña invalida");
        $("#errorContraseña").fadeIn("slow");
        error++;
    } else {

        $("#errorContraseña").removeClass("d-flex").addClass("d-none");
        error--;

    }




    var name = $("#name").val();


    if(name === null || name.length === 0 || name === "") {
        $("#errorName").removeClass("d-none").addClass("d-flex").find("small").text("nombre vacio");
        $("#errorName").fadeIn("slow");
        error++;
    } else if(!regexLetras.test(name)) {
        $("#errorName").removeClass("d-none").addClass("d-flex").find("small").text("nombre invalido");
        $("#errorName").fadeIn("slow");
        error++;
    } else {
        error--;
        $("#errorName").removeClass("d-flex").addClass("d-none");

    }


    var apellido = inputApellido.val();

    if(apellido === null || apellido.length === 0 || apellido === "") {
        $("#errorApellido").removeClass("d-none").addClass("d-flex").find("small").text("apellido vacio");
        $("#errorApellido").fadeIn("slow");
        error++;

    } else if(!regexLetras.test(apellido)) {
        $("#errorApellido").removeClass("d-none").addClass("d-flex").find("small").text("apellido invalido");
        $("#errorApellido").fadeIn("slow");
        error++;
    } else {
        $("#errorApellido").removeClass("d-flex").addClass("d-none");
        error--;
    }

    var nombreUsuario = inputNombreUsuario .val();

    if(nombreUsuario  === null || nombreUsuario .length === 0 || nombreUsuario  === "") {
        $("#errorNombreUsuario").removeClass("d-none").addClass("d-flex").find("small").text("NombreUsuario vacio");
        $("#errorNombreUsuario").fadeIn("slow");
        error++;
    } else if(!regexLetrasYNumeros.test(nombreUsuario )) {
        $("#errorNombreUsuario").removeClass("d-none").addClass("d-flex").find("small").text("NombreUsuario invalido");
        $("#errorNombreUsuario").fadeIn("slow");
        error++;
    } else {
        error--;
        $("#errorNombreUsuario").removeClass("d-flex").addClass("d-none");
        validacion = true;
    }


    var correo = inputCorreo.val();

    if(correo === null || correo.length === 0 || correo === "") {
        $("#errorCorreo").removeClass("d-none").addClass("d-flex").find("small").text("Correo invalido");
        $("#errorCorreo").fadeIn("slow");
        error++;
    } else if(!regexCorreo.test(correo)) {
        $("#errorCorreo").removeClass("d-none").addClass("d-flex").find("small").text("Correo invalido");
        $("#errorCorreo").fadeIn("slow");
        error++;
    } else {

        $("#errorCorreo").removeClass("d-flex").addClass("d-none");
        error--;
    }
    if(error === 0){
        validacion=true;
    }
    return validacion;
}


$("#registrar").click(function () {


    var validacion = validarFormatos();
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
        obj.lat=$("#lat").val();
        obj.lon=$("#lon").val();

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



