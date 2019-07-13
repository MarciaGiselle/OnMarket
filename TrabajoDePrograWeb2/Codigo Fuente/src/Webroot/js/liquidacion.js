var selectMes = $("#mes");
var selectYear = $("#year");
var liquidar = $('#liquidar');

function validarMes() {
    var mes = selectMes.val();
    var validacion = false;

    if (mes === null || mes === 0) {
        $("#errorMes").removeClass("d-none").addClass("d-flex").find("span").text("Seleccione un mes");
    } else {
        validacion = true;
    }

    return validacion;
}

function validarYear() {
    var year = selectYear.val();
    var validacion = false;

    if (year === null || year === 0) {
        $("#errorYear").removeClass("d-none").addClass("d-flex").find("span").text("Seleccione un año");
    } else {
        validacion = true;
    }

    return validacion;
}

liquidar.click(function () {

    if(validarMes() ){
        $(".error").fadeOut();
        $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
    }
    if(validarYear() ) {
        $(".error").fadeOut();
        $(".error").removeClass("d-flex").addClass("d-none").find("span").text("");
    }
    var validacion = validarMes() && validarYear();

    if(validacion){
    var obj = {};

    obj.mes = $("#mes").val();
    obj.year = $("#year").val();

    llamadaAjax(pathLiquidar, JSON.stringify(obj), true, "LiquidacionExitosa", "LiquidacionFallida");
    }
});

function LiquidacionExitosa(id){
    var numero = JSON.parse(JSON.stringify(id));

    alertify.alert("Nueva liquidación", "La liquidación # ha sido creada exitosamente!");
}

function LiquidacionFallida(err){
    alertify.alert("Nueva liquidación",err);
}

