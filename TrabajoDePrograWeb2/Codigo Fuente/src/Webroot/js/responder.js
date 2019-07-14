var idProd;
function pasarDatos(valor,valor2){

    $('#idComentario').val(valor);
    idProd=valor2;

    $("#cuadro").on("click", "button", function() {
        $(this).attr('id','seleccionado');
    });

}
$("#enviarDatos").click(function () {
    $("input").prop("disabled", true);

    var obj = {};

    obj.idComentario = $("#idComentario").val();
    obj.mensaje = $("#comentario").val();
    obj.idVendedor = $("#idVendedor").val();
    obj.idProducto = idProd;

    llamadaAjax(pathComentarios, JSON.stringify(obj), true, "RespuestaExitosa", "RespuestaFallida");

});

function RespuestaExitosa(array){

    $("#seleccionado").prop("disabled", true);
    location.reload();
    alertify.alert("Mis comentarios", "respuesta exitosa :)");

}


function RespuestaFallida(err){
    alertify.alert("Mis comentarios",err);
}