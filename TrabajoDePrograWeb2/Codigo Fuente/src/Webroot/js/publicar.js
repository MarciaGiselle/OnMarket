const regexLetrasYNumeros = /^[0-9a-zA-Z]+$/;
const regexNumeros = /^[0-9]+/;
const regexLetras = /[A-Za-z]+/;
const regexCorreo = /^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/;
const regexletrasYNumerosYespacios = /[A-Za-zñÑ0-9#&\-\s]/;

$("#nombre").keyup(function(){

    var name=$("#nombre").val();
    if(name === null || name.length === 0 || name === "") {
        $("#errorName").removeClass("d-none").addClass("d-flex").find("small").text("nombre vacio");
        $("#errorName").fadeIn("slow");

    }
    if(regexNumeros.test(name)) {
        $("#errorName").removeClass("d-none").addClass("d-flex").find("small").text("La descripcion no pueden ser solo números");
        $("#errorName").fadeIn("slow");
    }
    if(!regexLetras.test(name)) {
        $("#errorName").removeClass("d-none").addClass("d-flex").find("small").text("nombre invalido");
        $("#errorName").fadeIn("slow");

    }
    else {

        $("#errorName").removeClass("d-flex").addClass("d-none");

    }

});


function validarCategoria() {
    var categoria = $("#categoria");

    var year = categoria.val();
    var validacion = false;

    if (year === null || year === 0) {
        $("#errorYear").removeClass("d-none").addClass("d-flex").find("span").text("Seleccione un año");
    } else {
        validacion = true;
    }

    return validacion;
}
if(validarCategoria() ){
    $(".error").fadeOut();
    $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
}
$("#descripcion").keyup(function(){
    var name=$("#descripcion").val();
    if(name === null || name.length === 0 || name === "") {
        $("#errordescripcion").removeClass("d-none").addClass("d-flex").find("small").text("descripcion no puede quedar  vacia");
        $("#errordescripcion").fadeIn("slow");

    }
    if(regexNumeros.test(name)) {
        $("#errordescripcion").removeClass("d-none").addClass("d-flex").find("small").text("La descripcion no pueden ser solo números");
        $("#errordescripcion").fadeIn("slow");
    }else {

        $("#errordescripcion").removeClass("d-flex").addClass("d-none");

    }

});


$("#titulo").keyup(function dsads(){
    var name=$("#titulo").val();
    if(name === null || name.length === 0 || name === "") {
        $("#errortitulo").removeClass("d-none").addClass("d-flex").find("small").text("El título no puede estar vacio");
        $("#errortitulo").fadeIn("slow");
    }
    if((!regexletrasYNumerosYespacios.test(name))) {
        $("#errortitulo").removeClass("d-none").addClass("d-flex").find("small").text("Titulo incorrecto");
        $("#errortitulo").fadeIn("slow");
    }
     if(regexNumeros.test(name)) {
        $("#errortitulo").removeClass("d-none").addClass("d-flex").find("small").text("El titulo no pueden ser solo números");
        $("#errortitulo").fadeIn("slow");
    }else {
         $(".errortitulo").fadeOut();
         $(".errortitulo").removeClass("d-flex").addClass("d-none").find("span").text("");
    }
});



$("#precio").keyup(function(){
    var precio=$("#precio").val();
    if(precio === null || precio.length === 0 || precio === "") {
        $("#errorprecio").removeClass("d-none").addClass("d-flex").find("small").text("el precio no puede estar vacio");
        $("#errorprecio").fadeIn("slow");

    } else if(!regexNumeros.test(precio)) {

        $("#errorprecio").removeClass("d-none").addClass("d-flex").find("small").text("el precio es  numerico");
        $("#errorprecio").fadeIn("slow");

    } else {
        $("#errorprecio").removeClass("d-flex").addClass("d-none");


    }

});

$("#cantidad").keyup(function(){
    var cantidad=$("#cantidad").val();
    if(cantidad === null || cantidad.length === 0 || cantidad === "") {
        $("#errorcantidad").removeClass("d-none").addClass("d-flex").find("small").text("la cantidad no puede quedar vacia");
        $("#errorcantidad").fadeIn("slow");

    } else if(!regexNumeros.test(cantidad)) {

        $("#errorcantidad").removeClass("d-none").addClass("d-flex").find("small").text("la cantidad es numerica");
        $("#errorprecio").fadeIn("slow");

    } else {
        $("#errorcantidad").removeClass("d-flex").addClass("d-none");


    }

});

$("#envio").keyup(function(){
    var envio=$("#envio").val();
    if(terminos ===false){
        $("#errorenvio").removeClass("d-none").addClass("d-flex").find("small").text("seleccione un metodo de envio");
        $("#errorenvio").fadeIn("slow");
        error++;

    } else {
        $("#errorenvio").removeClass("d-flex").addClass("d-none");
        error--;

    }


});