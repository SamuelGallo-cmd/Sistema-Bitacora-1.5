const passwordError = document.getElementById('password-error');
const passwordErrorm = document.getElementById('password-errorm');

// Obtén el formulario y los elementos de entrada
const formUserAdd = document.getElementById('modalAddUser');
const formUserUpdate = document.getElementById('modalUpdateUser');

const idUserInput = document.getElementById('idUser');
const idUsermInput = document.getElementById('idUserm');

const nameUserInput = document.getElementById('nameUser');
const nameUsermInput = document.getElementById('nameUserm');

const lastNameUserInput = document.getElementById('lastNameUser');
const lastNameUsermInput = document.getElementById('lastNameUserm');



const emailUserInput = document.getElementById('emailUser');
const emailUsermInput = document.getElementById('emailUserm');

const roleUserInput = document.getElementById('roleUser');
const roleUsermInput = document.getElementById('roleUserm');

const passwordUserInput = document.getElementById('passwordUser');
const passwordUsermInput = document.getElementById('passwordUserm');


const directionUserInput = document.getElementById('directionUser');
const directionUsermInput = document.getElementById('directionUserm');

const estadoUserInput = document.getElementById('estadoUser');
const estadoUsermInput = document.getElementById('estadoUserm');

const telefonoUserInput = document.getElementById('telefonoUser');
const telefonoUsermInput = document.getElementById('telefonoUserm');

const rolesPermitidos = ['Admin', 'Usuario', 'SuperAdmin'];
const estadosPermitidos = ['Activo', 'Inactivo'];




let role = "";
let roleUsuario = "";
if(formUserAdd !== null && formUserUpdate != null){
    // Verificaciones para el formulario de agregar usuario
    formUserAdd.addEventListener('submit', function(event) {
        // Verifica si los campos están vacíos
        if (idUserInput.value === '' || nameUserInput.value === '' || lastNameUserInput.value === '' || sucursalUserInput.value === '' ||
            emailUserInput.value === '' || roleUserInput.value === '' || passwordUserInput.value === ''||
            directionUserInput.value === '' || estadoUserInput.value === '' || telefonoUserInput.value==='') {
            event.preventDefault(); // Evita que el formulario se envíe

            // Muestra un mensaje de error o realiza otra acción
            alert('Por favor, completa todos los campos obligatorios.');
        }else if(!validarLongitudPassword()){
            event.preventDefault(); // Evita que el formulario se envíe
            // Muestra un mensaje de error o realiza otra acción
            alert('Debes de digitar una contraseña valida.');
        }else if(roleUserInput.value === '' || !rolesPermitidos.includes(roleUserInput.value)) {
            event.preventDefault(); // Evita que el formulario se envíe
            // Muestra un mensaje de error o realiza otra acción
            alert('Por favor, selecciona un perfil válido.');
        }else if(!estadosPermitidos.includes(estadoUserInput.value)){
            event.preventDefault(); // Evita que el formulario se envíe
            // Muestra un mensaje de error o realiza otra acción
            alert('Por favor, selecciona un estado válido.');
        }
    });




    // Agrega un controlador de evento al enviar el formulario
    formUserUpdate.addEventListener('submit', function(event) {
        // Verifica si los campos están vacíos
        if (idUsermInput.value === '' || nameUsermInput.value === '' || lastNameUsermInput.value === ''||
            emailUsermInput.value === '' || roleUsermInput.value === '' ||
            directionUsermInput.value === '' || estadoUsermInput.value === '' || telefonoUsermInput.value ==='') {
            event.preventDefault(); // Evita que el formulario se envíe

            // Muestra un mensaje de error o realiza otra acción
            alert('Por favor, completa todos los campos obligatorios.');
        }else if(!validarLongitudPasswordm()){
            event.preventDefault(); // Evita que el formulario se envíe
            // Muestra un mensaje de error o realiza otra acción
            alert('Debes de digitar una contraseña valida.');
        }else if(role === 'SuperAdmin' && (roleUsuario === "Admin" || roleUsuario === "Usuario")){
            event.preventDefault(); // Evita que el formulario se envíe
            // Muestra un mensaje de error o realiza otra acción
            alert('No puedes editar un super administrador.');
        }else if(roleUsermInput.value === '' || !rolesPermitidos.includes(roleUsermInput.value)) {
            event.preventDefault(); // Evita que el formulario se envíe
            // Muestra un mensaje de error o realiza otra acción
            alert('Por favor, selecciona un perfil válido.');
        }else if(!estadosPermitidos.includes(estadoUsermInput.value)){
            event.preventDefault(); // Evita que el formulario se envíe
            // Muestra un mensaje de error o realiza otra acción
            alert('Por favor, selecciona un estado válido.');
        }
    });
    }


/**EDITAR USUARIO */

$(".btnUpdateUser").click(function() {
    let idEmpleado = $(this).attr("idEmpleado");

    let datas = new FormData();

    datas.append("idEmpleado", idEmpleado);

    $.ajax({

        url: "ajax/userAjax.php",
        method: "POST",
        data: datas,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            role = respuesta["role"];
            roleUsuario = document.getElementById("sessionRole").value;

            if(respuesta["role"] === "Admin" && (roleUsuario === "Admin" || roleUsuario === "Usuario")){

                $("#idUserm").val(respuesta["cedula"]);
                $("#nameUserm").val(respuesta["nombre"]);
                $("#lastNameUserm").val(respuesta["apellidos"]);
                $("#emailUserm").val(respuesta["email"]);
                $("#roleUserm").val(respuesta["role"]);
                $("#passwordActual").val(respuesta["password"]);
                $("#directionUserm").val(respuesta["direccion"]);
                $("#estadoUserm").val(respuesta["estado"]);
                $("#telefonoUserm").val(respuesta["telefono"]);









            }else{
                $("#idUserm").val(respuesta["cedula"]);
                $("#nameUserm").val(respuesta["nombre"]);
                $("#lastNameUserm").val(respuesta["apellidos"]);
                $("#emailUserm").val(respuesta["email"]);
                $("#roleUserm").val(respuesta["role"]);
                $("#passwordActual").val(respuesta["password"]);
                $("#directionUserm").val(respuesta["direccion"]);
                $("#estadoUserm").val(respuesta["estado"]);
                $('#telefonoUserm').val(respuesta["telefono"]);
                
            

                $('#idUserm').prop('readonly', true);
                $('#nameUserm').prop('readonly', false);
                $('#lastNameUserm').prop('readonly', false);
                $('#emailUserm').prop('readonly', false);
                $('#roleUserm').prop('disabled', false);
                $('#passwordActual').prop('readonly', false);
                $('#directionUserm').prop('readonly', false);
                $('#estadoUserm').prop('disabled', false);
                $('#telefonoUserm').prop('readonly', false);
                $('#passwordUserm').prop('readonly', false);
                $('#btnModificarUser').prop('disabled', false);
            }
            

        }

    })
})

$(".btnDeleteUser").click(function() {

    let idEmpleado = $(this).attr("idEmpleado");
    Swal.fire({
        title: 'Estas seguro de eliminar el usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Borrar'
    }).then((result) => {
        if (result.value) {

            window.location = "index.php?ruta=users&idEmpleadoE=" + idEmpleado;
        }

    })

})



$('#idUser, #idUserm').on('keypress', function(e) {
    let charCode = e.which ? e.which : e.keyCode;

    if (!esNumeroOLetraUsuario(charCode)) {
        e.preventDefault();
    }

    if (e.target.value.length >= 20) {
        e.preventDefault();
    }
});

$('#nameUser, #nameUserm').on('keypress input', function(e) {
    validarInputUser(e, 45);
});

$('#lastNameUser, #lastNameUserm').on('keypress input', function(e) {
    validarInputUser(e, 45);
});

$('#emailUser, #emailUserm').on('keypress input', function(e) {
    validarInputUser(e, 50);
});

$('#passwordUser, #passwordUserm').on('keypress input', function(e) {
    validarInputUser(e, 20);
});


$('#directionUser, #directionUserm').on('keypress input', function(e) {
    validarInputUser(e, 200);
});


$('#telefonoUser, #telefonoUserm').on('keypress input', function(e) {
    validarTelefonoUser(e);
});

function validarInputUser(e, maxLength) {
    let input = e.target.value;

    if (input.length >= maxLength) {
        e.preventDefault();
    }
}

function validarTelefonoUser(e) {
    let input = e.target.value;

    // Permitir solo números (código ASCII entre 47 y 58)
    if (e.keyCode <= 47 || e.keyCode >= 58 || input.length >= 8) {
        e.preventDefault();
    }
}

function esNumeroOLetraUsuario(charCode) {
    return (charCode >= 48 && charCode <= 57) || // Números
           (charCode >= 65 && charCode <= 90) || // Letras mayúsculas
           (charCode >= 97 && charCode <= 122);  // Letras minúsculas
}



if(passwordUserInput !== null && passwordUsermInput !== null){
    passwordUserInput.addEventListener('blur', validarLongitudPassword);

    function validarLongitudPassword() {
        const password = passwordUserInput.value;

        if (password.length < 8) {
            passwordError.style.display = 'block';
            return false;
        } else {
            passwordError.style.display = 'none';
            return true;
        }
    }

    passwordUsermInput.addEventListener('blur', validarLongitudPasswordm);

    function validarLongitudPasswordm() {
        const password = passwordUsermInput.value;
        if (password.length >= 8 || password.length == 0) {
            passwordErrorm.style.display = 'none';
            return true;
        } else{
            passwordErrorm.style.display = 'block';
            return false;
        }
    }
}





