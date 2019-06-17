
var comprar = $('#comprar');

comprar.click(function () {
    var obj = {};
    obj.nombre = $("#nombre").val();
    obj.precio = $("#precio").val();
    obj.cantidad = $("#cantidad").val();
    obj.idProducto = $("#id").val();

   llamadaAjax(pathCarrito, JSON.stringify(obj), true, "CompraExitosa", "CompraFallida");

});

function CompraExitosa(){
    alertify.alert("Mi Carrito", "agregado al carrito :)");
}

function CompraFallida(err){
    alertify.alert("Mi Carrito ", "No se pudo agregar al carrito :'(");
}

