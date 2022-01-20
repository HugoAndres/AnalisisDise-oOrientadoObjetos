var formulario = document.getElementById('codigo-barras');
var formulario2 = document.getElementById('formulario-op')

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);

    fetch('Funciones/buscarMedicamento.php',{
        method: 'POST',
        body: datos
    })
        .then(res => res.json())
        .then(data =>{
            console.log(data)
            if(data == 'error2'){
                alert("Por favor, ingresa un código de barras");
                location.reload();
            }else if(data == 'error'){

                var confirmacion = confirm("No se encontró el medicamento. ¿Desea generar uno nuevo?");
                if(confirmacion == true){
                    mensaje.innerHTML= `
                <div class = "caja-alerta" style = Display: none;>
                </div>
                `
                const nombre_form = document.querySelector('#nombre');
                nombre_form.readOnly=false;
                const presentacion_form = document.querySelector('#presentacion');
                presentacion_form.readOnly =false;
                const precio_form = document.querySelector('#precio');
                precio_form.readOnly= false;
                const fecha_form = document.querySelector('#fecha');
                fecha_form.readOnly = false;
                const piezas_form = document.querySelector('#piezas');
                piezas_form.readOnly = false;
                const codigo_form = document.querySelector('#codigo');
                const codigoll_form = document.querySelector('#codigo-llenado');
                codigo_form.value = codigoll_form.value;
                }else{
                    location.reload();
                }

            }else{
                mensaje.innerHTML= `
                <div class = "caja-alerta" style = Display: none;>
                </div>
                `
                console.log('')
                const nombre_form = document.querySelector('#nombre');
                nombre_form.value = data[0];
                const presentacion_form = document.querySelector('#presentacion');
                presentacion_form.value = data[1];
                const img_form = document.querySelector('#image');
                img_form.src ="imgProductos/"+data[2];
                const precio_form = document.querySelector('#precio');
                precio_form.readOnly= false;
                const fecha_form = document.querySelector('#fecha');
                fecha_form.readOnly = false;
                const piezas_form = document.querySelector('#piezas');
                piezas_form.readOnly = false;
                const codigo_form = document.querySelector('#codigo');
                const codigoll_form = document.querySelector('#codigo-llenado');
                codigo_form.value = codigoll_form.value;
            }
        })
})

formulario2.addEventListener('submit',function(e){
    e.preventDefault();
    var datos2 = new FormData(formulario2);
    console.log(FormData);
    fetch('Funciones/registrarMedicina.php',{
        method: 'POST',
        body: datos2
    })
        .then(res => res.json())
        .then(data => {
            console.log(data);
            if(data == 'Succes1'){
                alert("Los medicamentos se han registrado correctamente");
            }else if(data  == "Succes2"){
                alert("El medicamento y las unidades se registraron correctamente");
            }else{
                alert("Error");
            }

        })
})
