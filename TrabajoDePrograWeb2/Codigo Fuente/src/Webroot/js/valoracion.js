
function pasarId(valor){
    $('#idValorado').val(valor);
    $("#cuadro").on("click", "button", function() {
       $(this).attr('id','seleccionado');
    });
}

var enviarDatos = $('#enviarDatos');

enviarDatos.click(function () {
    $("input").prop("disabled", true);

    var obj = {};
    var estrellas= $( "input[name='estrellas']:checked").val();
    obj.estrellas=  estrellas;
    obj.idValorado = $("#idValorado").val();
    obj.comentario = $("#comentario").val();

    llamadaAjax(pathValorar, JSON.stringify(obj), true, "ValoracionExitosa", "ValoracionFallida");

});

function ValoracionExitosa(){
    alertify.alert("Valoracion", "Enviada exitosamente!");
    $("#seleccionado").prop("disabled", true);
    location.reload();
}

function ValoracionFallida(err){
    alertify.alert("Valoracion ","fallida");
}

function enable(valor) {
var id= valor;
$("#cuadro").find("button", function(){
    if(($("button").attr('id'))===id){
    }
}).addClass('disabled');
}

function disable(valor) {

}



