var idProd;
function pasarDatos(valor,valor2){

    $('#idComentario').val(valor);
    idProd=valor2;

    $("#cuadro").on("click", "button", function() {
        $(this).attr('id','seleccionado');
    });

}
function validarRespuesta(){

    var mensaje = $("#respuesta").val();
    if(mensaje === null || mensaje.length === 0 || mensaje=== "") {
        $("#error").removeClass("d-none").addClass("d-flex").find("small").text("El comentario no puede estar vacio ");
        $("#error").fadeIn("slow");
    }  else{
        $("#error").fadeOut();
        $("#error").removeClass("d-flex").addClass("d-none").find("span").text("");
        validacion = true;
    }
    return validacion;
}

$("#enviar").click(function () {

    if( validarRespuesta()){
    $("input").prop("disabled", true);

    var obj = {};

    obj.idComentario = $("#idComentario").val();
    obj.mensaje = $("#respuesta").val();
    obj.idVendedor = $("#idVendedor").val();
    obj.idProducto = idProd;

    llamadaAjax(pathComentarios, JSON.stringify(obj), true, "RespuestaExitosa", "RespuestaFallida");
}
});

function RespuestaExitosa(array){

    $("#seleccionado").prop("disabled", true);
    setTimeout(function () {

        window.location.reload();

    }, 1000);

    alertify.alert("Mis comentarios", "Respuesta exitosa :)");

}


function RespuestaFallida(err){
    alertify.alert("Mis comentarios",err);
}