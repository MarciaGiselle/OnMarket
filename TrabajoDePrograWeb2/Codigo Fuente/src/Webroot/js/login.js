const regexLetrasYNumeros = /^[0-9a-zA-Z]+$/;

var inputName = $('#inputName');
var inputPass = $('#inputPass');
var ingresar = $("#ingresar");
var errorName = $("#errorName");

function validarName() {

    var validacion = false;
    var name = inputName.val();

    if(name === null || name.length === 0 || name === "") {
        errorName.fadeIn("slow");

    } else if(!regexLetrasYNumeros.test(name)) {
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
    } else if(!regexLetrasYNumeros.test(pass)) {
        $("#errorPass2").fadeIn("slow");
    } else {
        validacion = true;
    }

    return validacion;
}

ingresar.click(function () {

    //$(".error").fadeOut();

    var validacion = validarName() && validarPassword();

    if(validacion) {
        $("input").prop("disabled", true);
        ingresar.prop("disabled", true);
        var obj = {};
        obj.nombre = inputName.val();
        obj.password = inputPass.val();
        alert(pathLoguear);
        llamadaAjax(pathLoguear, JSON.stringify(obj), true, "loginExitoso", "loginFallido");
    }
});

function loginExitoso(dummy) {
    alert("exitoso");
   window.location.href = pathHome;
}

function loginFallido(err) {

    alert("error");
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
function llamadaAjax(urlServicioWeb, datosServicioWeb, esAsincronico,
                     funcionEscenarioExitoso, funcionEscenarioErroneo, parametrosExtra,
                     noMostrarLoading, mensajeLoading) {

    var respuesta;

    alert ("llamada ajax");

    // el parametro parametrosExtra, son datos que se pueden mandar
    // opcionalmente y que serán reenviados a la funcion de exito o error.
    $.ajax({
        type: "POST",
        url: urlServicioWeb,
        data: {
            data: datosServicioWeb
        },
        async: esAsincronico,
        dataType: "json",
        traditional: true,
        //timeout: 15000,
        cache: false,
        success: function (jsDeRetorno, a) {
            respuesta = true;
            var res;
            if (!jsDeRetorno || !jsDeRetorno.error) {
                res = window[funcionEscenarioExitoso](jsDeRetorno,
                    parametrosExtra);
                return res;
            } else {
                res = window[funcionEscenarioErroneo](jsDeRetorno.error,
                    parametrosExtra, true);
                return res;
            }
        },

        error: function (e, a, i) {
            respuesta = false;
            if (e.status == 300) {
                window.location = e.responseText;
                return;
            } else if (e.readyState == 0) {
                // Network error
                var err =
                    "No se pudo conectar al servidor. Revise si tiene acceso a internet y vuelva a intentar nuevamente";
                if (window[funcionEscenarioErroneo])
                    return window[funcionEscenarioErroneo](err, parametrosExtra, true);
                else
                    return alertify.alert(err).setting('modal', true);
            }

            if (window[funcionEscenarioErroneo])
                return window[funcionEscenarioErroneo](e.responseText,
                    parametrosExtra);
            else
                alertify.alert(e.responseText).setting('modal', true);
        }
    });

    return respuesta;
}