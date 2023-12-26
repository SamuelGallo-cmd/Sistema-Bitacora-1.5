document.addEventListener('DOMContentLoaded', function () {
    // Nuevo evento para el botón de abrir el modal
    document.querySelectorAll('.btnAbrirModal').forEach(function (button) {
        button.addEventListener('click', function () {
            var idClient = button.getAttribute('idClient');
            document.getElementById('codigoBitacoraM2').value = idClient;

            var datas = new FormData();
            datas.append('idClient', idClient);

            // Hacer una solicitud POST sin jQuery
            fetch('ajax/bitacoraAjax.php', {
                method: 'POST',
                body: datas
            })
            .then(response => response.json())
            .then(data => {

                // Asignar valores a los campos correspondientes
                document.getElementById('estadoBitacoraM2').value = data.estado;
                document.getElementById('costoM2').value = data.monto;
                document.getElementById('bonoM2').value = data.bono;
                document.getElementById('saldoM2').value = data.saldo;
                document.getElementById('gastosM2').value = data.gastos;
                document.getElementById('reparacionM2').value = data.detalleReparacion;
            })
            .catch(error => {
                console.error(error);
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error al cargar los datos.',
                    icon: 'error'
                });
            });
        });
    });
});
