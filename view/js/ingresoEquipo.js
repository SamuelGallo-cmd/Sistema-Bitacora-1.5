document.addEventListener("DOMContentLoaded", function () {
    // Obtener referencias a elementos HTML
    var btnMostrarTabla = document.getElementById("btnMostrarTabla");
    var btnMostrarTablaCli = document.getElementById("btnMostrarTablaCli");
    var tablaContainer = document.getElementById("tabla-container");
    var tablaContainerCli = document.getElementById("tabla-containerCli");




        // Manejar el clic en el botón
        btnMostrarTablaCli.addEventListener("click", function () {
            // Alternar la visibilidad de la tabla al hacer clic en el botón
            if (tablaContainerCli.style.display === "none") {
                tablaContainerCli.style.display = "block";
            } else {
                tablaContainerCli.style.display = "none";
            }
        });
});



document.addEventListener("DOMContentLoaded", function () {
    $('#tabla').DataTable();
});

document.addEventListener("DOMContentLoaded", function () {
    $('#tablaCli').DataTable();
});






function mostrarFormularioCli() {
    // Obtén el div y el botón
    var formularioCli = document.getElementById("formularioCliente");
    var tablaCli = document.getElementById("tabla-containerCli");

    formularioCli.style.display = "block";
    tablaCli.style.display = "none";

}



    // Obtener el elemento de entrada de fecha
    var FingresoEquipoInput = document.getElementById('FingresoEquipo');

    // Obtener la fecha actual en formato ISO (YYYY-MM-DD)
    var currentDate = new Date().toISOString().split('T')[0];

    // Establecer el valor predeterminado del campo de fecha
    FingresoEquipoInput.value = currentDate;