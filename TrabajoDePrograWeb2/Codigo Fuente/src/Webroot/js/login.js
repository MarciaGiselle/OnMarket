const regexLetrasYNumeros2 = /^[0-9a-zA-Z]+$/;

var inputName = $('#inputName');
var inputPass = $('#inputPass');
var ingresar = $("#ingresar");
var errorName = $("#errorName");


function validarName() {
    var validacion = false;
    var name = inputName.val();

    if(name === null || name.length === 0 || name === "") {
        errorName.fadeIn("slow");

    } else if(!regexLetrasYNumeros2.test(name)) {
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
    } else if(!regexLetrasYNumeros2.test(pass)) {
        $("#errorPass2").fadeIn("slow");
    } else {
        validacion = true;
    }

    return validacion;
}

ingresar.click(function () {

   // $(".error").fadeOut();

    var validacion = validarName() && validarPassword();

    if(validacion) {
        $("input").prop("disabled", true);
        ingresar.prop("disabled", true);
        var obj = {};
        obj.nombre = inputName.val();
        obj.password = inputPass.val();

        llamadaAjax(pathLoguear, JSON.stringify(obj), true, "loginExitoso", "loginFallido");
    }else{
        alert("malll");
    }
});

function loginExitoso(dummy) {
   window.location.href = pathHome;
}

function loginFallido(err) {
    $("input").prop("disabled", false);
    ingresar.prop("disabled", false);
    alertify.alert("Error de Logueo", err);
}


// llamadoAWebService: Ejecuta un Servicio Web
// --------------------------------------------------------------------------------------------------------------------------
// urlServicioWeb = Url del Servicio Web que serà llamado por POST (ej: )

// datosServicioWeb = Datos en formato jSon a enviar al Servicio Web indicado (ej: )
// esAsincronico = Indica si el llamado al Servicio Web es asincrònico
// funcionEscenarioExitoso = Función que se ejecutarà en caso de que sea exitoso
// el llamado al Servicio Web indicado.
// El paràmetro se recibe como un String, pero al realizar el eval se ejecuta
// como funciòn.
// funcionEscenarioErroneo = Función que se ejecutarà en caso de que devuelva
// error el llamado al Servicio Web indicado.
// El paràmetro se recibe como un String, pero al realizar el eval se ejecuta
// como funciòn.
// Retornno: devuelve un booleano indicando si hubo errores
// --------------------------------------------------------------------------------------------------------------------------
