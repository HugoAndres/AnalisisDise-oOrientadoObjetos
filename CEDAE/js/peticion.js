$(buscar_datos())

function buscar_datos(consulta){
    $.ajax({
        url: 'Funciones/buscarProductos.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $(".tabla").html(respuesta);
        console.log(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

$(document).on('keyup', '#caja_busqueda', function(){
    var valor = $(this).val();
    if(valor != ""){
        buscar_datos(valor);
    }else{
        buscar_datos();
    }
})