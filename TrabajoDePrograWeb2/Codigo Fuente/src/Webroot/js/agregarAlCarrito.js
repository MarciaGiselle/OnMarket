
var agregar = $('#agregar');

agregar.click(function () {
    var obj = {};
  //  obj.nombre = $("#nombre").val();
  //  obj.precio = $("#precio").val();
    obj.cantidad = $("#cantidad").val();
    obj.idProducto = $("#id").val();

   llamadaAjax(pathCarrito, JSON.stringify(obj), true, " AgregrarAlCarritoExitosa", "AgregrarAlCarritoFallida");

});

function AgregrarAlCarritoExitosa(){
    alertify.alert("Mi Carrito", "agregado al carrito :)");
}

function AgregrarAlCarritoFallida(err){
    alertify.alert("Mi Carrito ",err);
}

