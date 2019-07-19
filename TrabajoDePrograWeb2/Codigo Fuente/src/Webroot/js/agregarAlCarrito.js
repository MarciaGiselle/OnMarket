var entredaid= 0;
var agregar = $('#agregar');


agregar.click(function () {
    var obj = {};
    //  obj.nombre = $("#nombre").val();
    //  obj.precio = $("#precio").val();
    obj.cantidad = $("#cantidad").val();
    obj.idProducto = $("#idProducto").val();
    obj.idVendedor = $("#idVendedor").val();

    llamadaAjax(pathCarrito, JSON.stringify(obj), true, "AgregarAlCarritoExitosa", "AgregrarAlCarritoFallida");

});

function AgregarAlCarritoExitosa(){
    alertify.alert("Mi Carrito", "agregado al carrito :)");
}

function AgregrarAlCarritoFallida(err){
    alertify.alert("Mi Carrito ",err);
}

