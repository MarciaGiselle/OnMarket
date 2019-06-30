const regexLetrasYNumeros = /^[0-9a-zA-Z]+$/;
const regexNumeros = /^[0-9]+/;
const regexLetras = /[A-Za-z]+/;

var inputNombre = $('#nombre');
var inputDescripcion = $('#descripcion');
var inputCantidad = $("#cantidad");
var inputPrecio =$("#precio");
//var inputCategoria = $("#categoria");
//var inputEnvio = $("#entrega");
var inputTitulo = $("#titulo");


inputImagen.cargarImagen();

var btnPublicar= $("#publicar");

function validarNombre() {

    var validacion = false;
    var nombre = inputNombre.val();

    if(nombre === null || nombre.length === 0 || nombre === "") {
        $("#errorNombre").removeClass("d-none").addClass("d-flex").find("small").text("Ingrese un nombre para el producto");
        $("#errorNombre").fadeIn("slow");
    } else if(!regexLetras.test(nombre)) {
        $("#errorNombre").removeClass("d-none").addClass("d-flex").find("small").text("El nombre debe contener sólo letras");
        $("#errorNombre").fadeIn("slow");
    } else {
        validacion = true;
    }
    return validacion;
}


btnPublicar.click(function () {
    // $(".error").fadeOut();
    if(validarNombre()){
        $(".error").fadeOut();
        $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
    }

    var validacion = validarNombre();

    if(validacion) {
        $("input").prop("disabled", true);
        btnPublicar.prop("disabled", true);
        var obj = {};
        obj.nombre = inputNombre.val();
        obj.descripcion=inputDescripcion.val();
        obj.cantidad = inputCantidad.val();
        obj.precio=inputPrecio.val();
        obj.categoria=inputCategoria.val();
        obj.envio=inputEnvio.val();
        obj.titulo=inputTitulo.val();
        obj.imagen=inputImagen.val();

        llamadaAjax(pathPublicar, JSON.stringify(obj), true, "publicacionExitosa", "publicacionFallida");
    }
});

function publicacionExitosa(dummy) {

    window.location.href = pathHome;
}

function publicacionFallida(err) {

    $("input").prop("disabled", false);
    btnPublicar.prop("disabled", false);
    alertify.alert("Error al realizar la publicación", err);
}
