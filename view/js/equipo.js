// Obtén el formulario y los elementos de entrada
const formEquipoAdd = document.getElementById('modalAddEquipo');
const formEquipoUpdate = document.getElementById('modalUpdateEquipo');

const serialEquipoInput = document.getElementById('serialEquipo');
const serialEquipomInput = document.getElementById('serialEquipom');

const marcaEquipoInput = document.getElementById('marcaEquipo');
const marcaEquipomInput = document.getElementById('marcaEquipom');

const modeloEquipoInput = document.getElementById('modeloEquipo');
const modeloEquipomInput = document.getElementById('modeloEquipom');




const estadoEquipoInput = document.getElementById('estadoEquipo');
const estadoEquipomInput = document.getElementById('estadoEquipom');

const contrasenaEquipoInput = document.getElementById('contrasenaEquipom');
const contrasenaEquipomInput = document.getElementById('contrasenaEquipom');


const otraInfoEquipoInput = document.getElementById('otraInfoEquipo');
const otraInfoEquipomInput = document.getElementById('otraInfoEquipom');





if(formEquipoAdd !== null && formEquipoUpdate !== null) {
    // Verificaciones para el formulario de agregar equipo
    formEquipoAdd.addEventListener('submit', function(event) {
        // Verifica si los campos están vacíos
        if (serialEquipoInput.value === '' || marcaEquipoInput.value === '' || modeloEquipoInput.value === '') {
            event.preventDefault(); // Evita que el formulario se envíe

            // Muestra un mensaje de error o realiza otra acción
            alert('Por favor, completa todos los campos obligatorios.');
        }
    });

    // Agrega un controlador de evento al enviar el formulario
    formEquipoUpdate.addEventListener('submit', function(event) {
        // Verifica si los campos están vacíos
        if (serialEquipomInput.value === '' || marcaEquipomInput.value === '' || modeloEquipomInput.value === ''
        ) {
            event.preventDefault(); // Evita que el formulario se envíe

            // Muestra un mensaje de error o realiza otra acción
            alert('Por favor, completa todos los campos obligatorios.');
        }
    });    
}









$(".btnUpdateEqui").click(function(){
    var serialEquipo = $(this).attr("idReparacion");
    var datas = new FormData();

    datas.append("serialEquipo", serialEquipo);

    $.ajax({

        url:"ajax/equipoAjax.php",
        method:"POST",
        data: datas,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            $("#idReparacionm").val(respuesta["idReparacion"]);
            $("#serialEquipom").val(respuesta["serie"]);
            $("#marcaEquipom").val(respuesta["marca"]);
            $("#modeloEquipom").val(respuesta["modelo"]);
            $("#estadoEquipom").val(respuesta["estado"]);
            $("#contrasenaEquipom").val(respuesta["contrasena"]);
            $("#otraInfoEquipom").val(respuesta["otros"]);
        }

    })
})



$('#serialEquipo, #serialEquipom').on('keypress', function(e) {
    let charCode = e.which ? e.which : e.keyCode;

    if (!esNumeroOLetraCliente(charCode)) {
        e.preventDefault();
    }

    if (e.target.value.length >= 20) {
        e.preventDefault();
    }
});





$('#marcaEquipo, #marcaEquipom').on('keypress', function(e) {
    let charCode = e.which ? e.which : e.keyCode;

    if (!esNumeroOLetraCliente(charCode)) {
        e.preventDefault();
    }

    if (e.target.value.length >= 20) {
        e.preventDefault();
    }
});



$('#modeloEquipo, #modeloEquipom').on('keypress', function(e) {
    let charCode = e.which ? e.which : e.keyCode;

    if (!esNumeroOLetraCliente(charCode)) {
        e.preventDefault();
    }

    if (e.target.value.length >= 20) {
        e.preventDefault();
    }
});








$('#estadoEquipo, #estadoEquipom').on('keypress', function(e) {
    let charCode = e.which ? e.which : e.keyCode;

    if (!esNumeroOLetraCliente(charCode)) {
        e.preventDefault();
    }

    if (e.target.value.length >= 20) {
        e.preventDefault();
    }
});



$('#contrasenaEquipo, #contrasenaEquipom').on('keypress', function(e) {
    let charCode = e.which ? e.which : e.keyCode;

    if (!esNumeroOLetraCliente(charCode)) {
        e.preventDefault();
    }

    if (e.target.value.length >= 20) {
        e.preventDefault();
    }
});



function esNumeroOLetraCliente(charCode) {
    return (charCode >= 48 && charCode <= 57) || // Números
           (charCode >= 65 && charCode <= 90) || // Letras mayúsculas
           (charCode >= 97 && charCode <= 122);  // Letras minúsculas
}



function validarInputEquipo(e, maxLength) {
    let input = e.target.value;

    if (input.length >= maxLength) {
        e.preventDefault();
    }
}