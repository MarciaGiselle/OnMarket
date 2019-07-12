const regexLetrasYNumeros = /^[0-9a-zA-Z]+$/;
const regexNumeros = /^[0-9]+/;
const regexLetras = /[A-Za-z]+/;
const regexCorreo = /^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/;
var confirmar = $("#confirmar");
var inputnumeroTarjeta = $("#numeroDeTarjeta");
var inputcodigo = $("#codigoDeSeguridad");
var inputfecha = $("#fechaDeVencimiento");
var inputtotal = $('#total');
var carrito = $('#carrito');
var inputEmail = $('#email');
var inputDireccion = $('#direccion');

function validarEmail(){
    var validacion = false;
    var email = inputEmail.val();
    if(email === null || email.length === 0 || email === "") {
        $("#errorEmail").removeClass("d-none").addClass("d-flex").find("small").text("Ingrese un email");
        $("#errorEmail").fadeIn("slow");
    } else if (!regexCorreo.test(email)){
        $("#errorEmail").removeClass("d-none").addClass("d-flex").find("small").text("El formato del email es invalido ");
        $("#errorEmail").fadeIn("slow");
    }  else{

        validacion = true;
    }
    return validacion;
}
function validarDireccion(){
    var validacion = false;
    var direccion = inputDireccion.val();
    if(direccion === null || direccion.length === 0 || direccion=== "") {
        $("#errorDireccion").removeClass("d-none").addClass("d-flex").find("small").text("Ingrese una direccion");
        $("#errorDireccion").fadeIn("slow");
    }  else{

        validacion = true;
    }
    return validacion;
}

function validarNumeroTarjeta(){
    var validacion = false;
    var numero = inputnumeroTarjeta.val();
    if(numero === null || numero.length === 0 || numero === "") {
        $("#errorNumero").removeClass("d-none").addClass("d-flex").find("small").text("Ingrese un número de tarjeta");
        $("#errorNumero").fadeIn("slow");
    } else if ((numero.length) != 16){
        $("#errorNumero").removeClass("d-none").addClass("d-flex").find("small").text("El número de tarjeta debe tener 16 digitos");
        $("#errorNumero").fadeIn("slow");
    } else if(!regexNumeros.test(numero)) {
        $("#errorNumero").removeClass("d-none").addClass("d-flex").find("small").text("El número de tarjeta sólo puede contener números");
        $("#errorNumero").fadeIn("slow");
    } else{
        validacion = true;
    }
    return validacion;
}


function validarCodigo(){
    var validacion = false;
    var codigo = inputcodigo.val();
    if(codigo === null || codigo.length === 0 || codigo === "") {
        $("#errorCodigo").removeClass("d-none").addClass("d-flex").find("small").text("Ingrese el código de seguridad");
      $("#errorCodigo").fadeIn("slow");
    } else if ((codigo.length) != 3){
        $("#errorCodigo").removeClass("d-none").addClass("d-flex").find("small").text("El código de seguridad debe tener 3 digitos");
        $("#errorCodigo").fadeIn("slow");
    } else if(!regexNumeros.test(codigo)) {
      $("#errorCodigo").removeClass("d-none").addClass("d-flex").find("small").text("El codigo de seguridad debe ser numérico");
      $("#errorCodigo").fadeIn("slow");
    } else {
        validacion = true;
    }

    return validacion;

}



function validarFecha(){

    var validacion = false;
    var fecha = inputfecha.val();
    var fechaVenci= new Date(fecha);
    var hoy = new Date();
    var dd = hoy.getDate();

    if(fecha === null || fecha.length === 0 || fecha === "") {
       $("#errorFecha").removeClass("d-none").addClass("d-flex").find("small").text("Ingrese la fecha de vencimiento");
       $("#errorFecha").fadeIn("slow");
    }else if(hoy.getTime()>fechaVenci.getTime()){
        $("#errorFecha").removeClass("d-none").addClass("d-flex").find("small").text("Ingrese una fecha válida");
        $("#errorFecha").fadeIn("slow");
    }
    else{

        validacion = true;
    }

    return validacion;

}





confirmar.click(function () {


    if(validarNumeroTarjeta() ){
        $(".error").fadeOut();
        $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
    }
    if(validarEmail() ){
        $(".error").fadeOut();
        $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
    }
    if(validarDireccion() ){
        $(".error").fadeOut();
        $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
    }
    if(validarCodigo() ){
        $(".error").fadeOut();
        $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
    }
    if(validarFecha() ){
        $(".error").fadeOut();
        $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
    }

    var validacion = validarDireccion()&& validarEmail() && validarCodigo() && validarNumeroTarjeta() && validarFecha();
    if(validacion) {
        var obj = {};
        obj.total = inputtotal.val();
        obj.numeroTarjeta = inputnumeroTarjeta.val();
        obj.codigoDeSeguridad = inputcodigo.val();
        obj.fechaDeVencimiento = inputfecha.val();
        obj.direccion = $('#direccion').val();
        obj.email=inputEmail.val();


        llamadaAjax(pathCompra, JSON.stringify(obj), true, "compraExitosa", "loginFallido");
    }
});

function compraExitosa(dummy) {
    alertify.alert("¡Compra Exitosa!", "Espere unos segundos y podrá ver sus compras");

    setTimeout(function () {

        window.location.href = pathMisCompras;

    }, 1000);

}

function loginFallido(err) {

    alertify.alert("Mi Compra", err);
}
