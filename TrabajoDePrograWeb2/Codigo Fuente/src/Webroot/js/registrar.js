const regexLetrasYNumeros = /^[0-9a-zA-Z]+$/;
const regexNumeros = /^[0-9]+/;
const regexLetras = /[A-Za-z]+/;
const regexCorreo = /^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/;
const regexcontra =/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{5,16}$/;

var inputName = $("#nombre");
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
var inputDireccion = $("#direccion");
var registrar = $("#registrar");


$("button[name='btnBuscar']").click(function () {
    $("#contenedorMapa").removeClass("d-none").addClass("d-flex");
});


//falta el de terminos y condiciones

function validarCuit() {
    var validacion = false;
    var cuit = inputCuit.val();

    if (cuit === null || cuit.length === 0 || cuit === "") {
        $("#errorCuit").removeClass("d-none").addClass("d-flex").find("small").text("Debe insertar un Cuit");
        $("#errorCuit").fadeIn("slow");
    } else if (!regexNumeros.test(cuit)) {

        $("#errorCuit").removeClass("d-none").addClass("d-flex").find("small").text("El Cuit debe ser numérico");
        $("#errorCuit").fadeIn("slow");
    } else if ((cuit.length) != 11) {
        $("#errorCuit").removeClass("d-none").addClass("d-flex").find("small").text("El cuit debe tener 11 números");
        $("#errorCuit").fadeIn("slow");
    } else {
        validacion = true;
        $("#errorCuit").removeClass("d-flex").addClass("d-none");

    }
    return validacion;

}



function validarTerminos() {
    var validacion = false;
    var terminos = document.getElementById('terminos').checked;

    if(terminos ===false){
        $("#errorTerminos").removeClass("d-none").addClass("d-flex").find("small").text("Acepte los términos y condiciones");
        $("#errorTerminos").fadeIn("slow");
        error++;

    } else {
        validacion = true;
        $("#errorTerminos").removeClass("d-flex").addClass("d-none");

    }
    return validacion;

}



    var sexo = inputSexo.val();

    /*if(sexo === null || sexo.length === 0 || sexo === "") {
        //  errorName.fadeIn("slow");
        error++;
    } else {
        error--;

    }*/

function validarPass() {
    var validacion = false;
    var pass = inputPass.val();
    var passDos = inputPass2.val();

    if(pass === null || pass.length === 0 || pass === "") {
        $("#errorContraseña").removeClass("d-none").addClass("d-flex").find("small").text("Debe insertar una contraseña");
        $("#errorContraseña").fadeIn("slow");
    }else if(pass != passDos){
        $("#errorContraseña").removeClass("d-none").addClass("d-flex").find("small").text("Las contraseñas deben ser iguales");
        $("#errorContraseña").fadeIn("slow");
    } else if(!regexcontra.test(pass)) {
        $("#errorContraseña").removeClass("d-none").addClass("d-flex").find("small").text("La contraseña debe tener al entre 5 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.\n" +
            "NO puede tener otros símbolos.");
        $("#errorContraseña").fadeIn("slow");
    } else {
        $("#errorContraseña").removeClass("d-flex").addClass("d-none");
        validacion = true;

    }
    return validacion;


}


   function validarName() {
       var validacion = false;
       var name = inputName.val();

       if(name === null || name.length === 0 || name === "") {
           $("#errorName").removeClass("d-none").addClass("d-flex").find("small").text("Debe insertar un nombre");
           $("#errorName").fadeIn("slow");
       }
       else if(!regexLetras.test(name)) {
           $("#errorName").removeClass("d-none").addClass("d-flex").find("small").text("Inserte sólo letras");
           $("#errorName").fadeIn("slow");
       } else {
           validacion = true;
           $("#errorName").removeClass("d-flex").addClass("d-none");

       }
       return validacion;

   }


   function validarApellido() {
       var validacion = false;
       var apellido = inputApellido.val();

       if(apellido === null || apellido.length === 0 || apellido === "") {
           $("#errorApellido").removeClass("d-none").addClass("d-flex").find("small").text("Debe insertar un apellido");
           $("#errorApellido").fadeIn("slow");

       } else if(!regexLetras.test(apellido)) {
           $("#errorApellido").removeClass("d-none").addClass("d-flex").find("small").text("Inserte sólo letras");
           $("#errorApellido").fadeIn("slow");
       } else {
           $("#errorApellido").removeClass("d-flex").addClass("d-none");
           validacion = true;

       }
       return validacion;

   }




function validarNombreUsuario() {
    var nombreUsuario = inputNombreUsuario .val();
    var validacion = false;

    if(nombreUsuario  === null || nombreUsuario .length === 0 || nombreUsuario  === "") {
        $("#errorNombreUsuario").removeClass("d-none").addClass("d-flex").find("small").text("Debe insertar un nombre de usuario");
        $("#errorNombreUsuario").fadeIn("slow");
    } else if(!regexLetrasYNumeros.test(nombreUsuario )) {
        $("#errorNombreUsuario").removeClass("d-none").addClass("d-flex").find("small").text("El nombre pueden ser letras y números");
        $("#errorNombreUsuario").fadeIn("slow");
    } else {
        $("#errorNombreUsuario").removeClass("d-flex").addClass("d-none");
        validacion = true;
    }
    return validacion;

}



function validarCorreo() {
    var correo = inputCorreo.val();
    var validacion = false;

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




function validarDireccion() {
    var direccion = inputDireccion.val();
    var validacion = false;
    if(direccion === null || direccion.length === 0 || direccion === "") {
        $("#errorDireccion").removeClass("d-none").addClass("d-flex").find("small").text("Debe insertar una dirección");
        $("#errorDireccion").fadeIn("slow");
    }else if(!regexLetras.test(direccion)) {
        $("#errorDireccion").removeClass("d-none").addClass("d-flex").find("small").text("Inserte sólo letras");
        $("#errorDireccion").fadeIn("slow");
    }else{
        validacion = true;

    }
    return validacion;


}





registrar.click(function () {

    var validacion = validarName() && validarApellido() && validarCorreo() && validarCuit() &&
         validarNombreUsuario() && validarPass() && validarTerminos() && validarDireccion() ;
alert(validacion);
    if(validacion) {
        $("input").prop("disabled", true);
        registrar.prop("disabled", true);
        var obj = {};
        obj.nombre = $("#nombre").val();
        obj.apellido=$("#apellido").val();
        obj.pass = $("#pass").val();
        obj.pass2 = $("#pass2").val();
        obj.cuit= $("#cuit").val();
        obj.correo=$("#correo").val();
        obj.nombreUsuario=$("#nombreUsuario").val();
        obj.sexo=$("#sexo").val();
        obj.direccion=$("#direccion").val();
        obj.terminos=$("#terminos").val();
        obj.lat=$("#lat").val();
        obj.lon=$("#lon").val();

        llamadaAjax(pathRegistrar, JSON.stringify(obj), true, "loginExitoso", "loginFallido");
    }
});

function loginExitoso(dummy) {
    $("input").prop("disabled", false);
    registrar.prop("disabled", false);

    alertify.alert("Te has registrado exitosamente!","Aguarde unos segundos...");
    setTimeout(function () {

        window.location.href = pathHome;

    }, 1200);
}

function loginFallido(err) {

    $("input").prop("disabled", false);
    registrar.prop("disabled", false);

    alertify.alert("Error de Logueo", err);
}



