
var eliminar = $('#eliminar');
var inputProdAEliminar= $('#idEliminado');

eliminar.click(function(){
    $("input").prop("disabled", true);
    eliminar.prop("disabled", true);
    var obj = {};
    obj.idEliminado = inputProdAEliminar.val();

    llamadaAjax(pathEliminar, JSON.stringify(obj), true, "eliminacionExitosa", "eliminacionFallida");
});

function eliminacionExitosa(){
    alertify.alert("Mi Carrito", "Eliminado");
    setTimeout(function () {

        window.location.reload();

    }, 3000);


}

function eliminacionFallida(err){
    alertify.alert("Mi Carrito ",err);
}

