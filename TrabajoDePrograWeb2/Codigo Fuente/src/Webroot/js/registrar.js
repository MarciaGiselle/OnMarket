const regexLetrasYNumeros = /^[0-9a-zA-Z]+$/;
const regexNumeros = /^[0-9]+/;
const regexLetras = /[A-Za-z]+/;
const regexCorreo = /^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/;

var inputName = $('#nombre');
var inputApellido = $('#apellido');
var inputCorreo = $("#correo");
var inputCuit =$("#cuit");
var inputNombreUsuario = $("#nombreUsuario");
var inputPass = $("#pass");
var inputPass2 = $("#pass2");
var inputSexo = $("#sexo");
var inputTerminos = $("#terminos");

var enviar = $("#enviar");
//falta el de terminos y condiciones

function validarCuit() {


    var validacion = false;
    var cuit = inputCuit.val();



    if(cuit === null || cuit.length === 0 || cuit === "") {


    } else if(!regexNumeros.test(cuit)) {


    } else {


        validacion = true;
    }

    return validacion;
}

function validarTerminos() {

    var validacion = false;
    var terminos = inputTerminos.val();


    //if(terminos ===null){
   //  alert("error");

   // } else {


        validacion = true;
   // }

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
    var pass = inputPass.val();

    if(pass === null || pass.length === 0 || pass === "") {
        //  errorName.fadeIn("slow");

    } else if(!regexLetrasYNumeros.test(pass)) {
        // errorName.fadeIn("slow");

    } else {


        validacion = true;
    }

    return validacion;
}
function validarNombre() {

    var validacion = false;
    var name = inputName.val();



    if(name === null || name.length === 0 || name === "") {

    } else if(!regexLetras.test(name)) {


    } else {


        validacion = true;
    }

    return validacion;
}
function validarApellido() {

    var validacion = false;
    var apellido = inputApellido.val();

    if(apellido === null || apellido.length === 0 || apellido === "") {
       // errorName.fadeIn("slow");

    } else if(!regexLetras.test(apellido)) {
       // errorName.fadeIn("slow");

    } else {


        validacion = true;
    }

    return validacion;
}




function validarNombreUsuario() {

    var validacion = false;
    var nombreUsuario = inputNombreUsuario .val();

    if(nombreUsuario  === null || nombreUsuario .length === 0 || nombreUsuario  === "") {
        // errorName.fadeIn("slow");

    } else if(!regexLetrasYNumeros.test(nombreUsuario )) {
        // errorName.fadeIn("slow");

    } else {


        validacion = true;
    }

    return validacion;
}

function validarCorreo() {

    var validacion = false;
    var correo = inputCorreo.val();

    if(correo === null || correo.length === 0 || correo === "") {
        // errorName.fadeIn("slow");

    } else if(!regexCorreo.test(correo)) {
        // errorName.fadeIn("slow");

    } else {


        validacion = true;
    }

    return validacion;
}


enviar.click(function () {
    alert("entro al js");
    // $(".error").fadeOut();

    var validacion = validarTerminos()&& validarCuit() && validarNombre() && validarApellido() && validarNombreUsuario() &&  validarCorreo()&&  validarSexo()&&  validarPass();

    if(validacion) {

        alert("entro casi al ajax");
        $("input").prop("disabled", true);
     enviar.prop("disabled", true);
        var obj = {};
        obj.nombre = inputName.val();
        obj.apellido=inputApellido.val();
        obj.pass = inputPass.val();
        obj.pass2 = inputPass2.val();
        obj.cuit= inputCuit.val();
        obj.correo=inputCorreo.val();
        obj.nombreUsuario=inputNombreUsuario.val();
        obj.sexo=inputSexo.val();
        obj.terminos=inputTerminos.val();



        llamadaAjax(pathRegistrar, JSON.stringify(obj), true, "loginExitoso", "loginFallido");
    }
});

function loginExitoso(dummy) {

    window.location.href = pathHome;
}

function loginFallido(err) {


    $("input").prop("disabled", false);
    enviar.prop("disabled", false);
    alertify.alert("Error de Logueo", err);
}



