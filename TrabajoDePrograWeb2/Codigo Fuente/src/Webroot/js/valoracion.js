
function pasarId(valor){
    $('#idValorado').val(valor);
}

var enviarDatos =$("#enviar");


enviarDatos.click(function () {
    alert("ajax");

    $("input").prop("disabled", true);

    var obj = {};
    obj.estrellas= $("#estrellas").val();
    obj.idValorado = $("#idValorado").val();
    llamadaAjax(pathValorar, JSON.stringify(obj), true, "ValoracionExitosa", "ValoracionFallida");

});

function ValoracionExitosa(){
    alertify.alert("Valoracion", "Enviada exitosamente!");
}

function ValoracionFallida(err){
    alertify.alert("Valoracion ","fallifa");
}





