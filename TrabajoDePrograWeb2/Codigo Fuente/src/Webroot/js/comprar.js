const regexLetrasYNumeros = /^[0-9a-zA-Z]+$/;
const regexNumeros = /^[0-9]+/;
const regexLetras = /[A-Za-z]+/;

var confirmar = $("#confirmar");
var inputnumeroTarjeta = $("#numeroDeTarjeta");
var inputcodigo = $("#codigoDeSeguridad");
var inputfecha = $("#fechaDeVencimiento");
var inputtotal = $('#total');

function validarCodigo(){
    var validacion = false;
    var codigo = inputcodigo.val();
    if(codigo === null || codigo.length === 0 || codigo === "") {
      //  $("#errorNombre").removeClass("d-none").addClass("d-flex").find("small").text("Ingrese el codigo de seguridad");
     //   $("#errorNombre").fadeIn("slow");
    } else if(!regexNumeros.test(codigo)) {
      //  $("#errorNombre").removeClass("d-none").addClass("d-flex").find("small").text("El codigo de seguirad debe ser numerico");
       // $("#errorNombre").fadeIn("slow");
    } else {


        validacion = true;
    }

    return validacion;

}


function validarFecha(){
    var validacion = false;
    var fecha = inputfecha.val();
    if(fecha === null || fecha.length === 0 || fecha === "") {
      //  $("#errorNombre").removeClass("d-none").addClass("d-flex").find("small").text("Complete la fecha de vencimiento");
        //$("#errorNombre").fadeIn("slow");
    }else
    {


        validacion = true;
    }

    return validacion;

}

function validarNumeroTarjeta(){

    var validacion = false;
    var numero = inputnumeroTarjeta.val();
    if(numero === null || numero.length === 0 || numero === "") {
      //  $("#errorNombre").removeClass("d-none").addClass("d-flex").find("small").text("Complete la fecha de vencimiento");
        //$("#errorNombre").fadeIn("slow");
    } else if(!regexNumeros.test(numero)) {
        //  $("#errorNombre").removeClass("d-none").addClass("d-flex").find("small").text("El codigo de seguirad debe ser numerico");
        // $("#errorNombre").fadeIn("slow");
    } else{


        validacion = true;
    }

    return validacion;

}




confirmar.click(function () {


    var validacion = validarNumeroTarjeta() && validarCodigo() && validarFecha();
    if(true) {
        var obj = {};
        obj.total = inputtotal.val();
        obj.numeroTarjeta = inputnumeroTarjeta.val();
        obj.codigoDeSeguridad = inputcodigo.val();
        obj.fechaDeVencimiento = inputfecha.val();

        llamadaAjax(pathCompra, JSON.stringify(obj), true, "loginExitoso", "loginFallido");
    }
});

function loginExitoso(dummy) {
    alertify.alert("¡Compra Exitosa!", "Espere unos segundos y será redireccionado al inicio");

    setTimeout(function () {

        window.location.href = pathHome;

    }, 5000);

}

function loginFallido(err) {

    alertify.alert("Mi Compra", err);
}
