var div= $("#div");
var id;

function pasarId(valor){
   id=valor;


}


$("#comentar").click(function () {
    var obj = {};

    obj.mensaje = $("#mensajeNuevo").val();
    obj.idVendedor = $("#idVendedor").val();
    obj.idProducto = $("#idProducto").val();
    obj.idComentario=null;

    llamadaAjax(pathComentarios, JSON.stringify(obj), true, "AgregarExitosa", "AgregrarFallida");

});

function AgregarExitosa(array){
    var datos = JSON.parse(JSON.stringify(array));

    $('#comentarios').addClass('d-none');

    for (var i = 0; i < datos.length; i++) {



        div.append(
            '<div class="col-5 col-auto alert alert-primary">'+
            '<h6>'+datos[i].comentario.fecha+'</h6>' +
            '<h5>'+datos[i].comentario.mensaje+'</h5>'+

            '</div>'


        );

        if((datos[i].respuesta)!==null){
            $("#div2").append(
                '<div id="div2" class="div2 col-9 col-auto alert alert-primary">'+
                '<h6>'+datos[i].respuesta.fecha+'</h6>' +
                '<h5>'+datos[i].respuesta.mensaje+'</h5>'+

                '</div>'


            );
        }
     }

    alertify.alert("Mis comentarios", "comentario exitoso :)");

}

function AgregrarFallida(err){
    alertify.alert("Mis comentarios",err);
}