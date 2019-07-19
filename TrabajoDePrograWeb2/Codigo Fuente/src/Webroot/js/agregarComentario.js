var div= $("#div");
var id;

function pasarId(valor){
   id=valor;


}
function validarComentario(){
    var validacion = false;
    var mensaje = $("#mensajeNuevo").val();
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

$("#comentar").click(function () {

    if(validarComentario()){
    var obj = {};

    obj.mensaje = $("#mensajeNuevo").val();
    obj.idVendedor = $("#idVendedor").val();
    obj.idProducto = $("#idProducto").val();
    obj.idComentario=null;

    llamadaAjax(pathComentarios, JSON.stringify(obj), true, "AgregarExitosa", "AgregrarFallida");
}
});

function AgregarExitosa(array){
    var datos = JSON.parse(JSON.stringify(array));

    $('#comentarios').addClass('d-none');
    $( ".reseteado").remove();

    for (var i = 0; i < datos.length; i++) {

        $("#div1").append(
        '<div class="reseteado">'+
        '<div class="row">'+
            '<div class="col col-md-8 align-self-start">'+
            '<div class=" alert alert-primary">'+
            '<h6 class="font-weight-bold">'+datos[i].usuario.name+ ' '+datos[i].usuario.lastname+
            '</h6>'+

        '<div class="float-right">'+
            '<h6>'+datos[i].comentario.fecha+'</h6>' +
                '</div>'+
                '<div>'+
            '<h5>'+datos[i].comentario.mensaje+'</h5>'+
                '</div>'+
            '</div>'+
          '  </div>  '+
            '  </div>  '
        );

        if((datos[i].respuesta)!==null){
            $("#div1").append(
            '<div class="row justify-content-end ">'+
                '<div class="col-8 align-self-end">'+
                '<div class="alert alert-secondary ">'+
                '<h6 class="font-weight-bold">'+datos[i].usuario.name+ ' '+datos[i].usuario.lastname+
                '</h6>'+
            '<div class="float-right">'+
             '<h5>'+datos[i].respuesta.fecha+'</h5>'+
                '</div>'+
                '<div>'+
                '<h5>'+datos[i].respuesta.mensaje+'</h5>'+
                   '</div>'+
                  '</div>'+
                 '</div>'+
                '</div>'
            );
        }
    }

}

function AgregrarFallida(err){
    alertify.alert("Mis comentarios",err);
}