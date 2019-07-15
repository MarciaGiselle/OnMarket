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

    for (var i = 0; i < datos.length; i++) {



        div.append(

            '<div class=" alert alert-primary">'+
            '<div class="float-right ">'+
            '<h6>'+datos[i].comentario.fecha+'</h6>' +
                '</div>'+
                '<div>'+
            '<h3>'+datos[i].comentario.mensaje+'</h3>'+
                '</div>'




        );

        if((datos[i].respuesta)!==null){
            $("#div2").append(

             '<h5>'+datos[i].respuesta.mensaje+'</h5>'


         );
        }

     }

    alertify.alert("Mis comentarios", "comentario exitoso :)");

}

function AgregrarFallida(err){
    alertify.alert("Mis comentarios",err);
}