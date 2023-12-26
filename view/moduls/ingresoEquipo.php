<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/ingresoEquipo.css">


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/user.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<div id="container pt-4" style="margin-top: 100px;">

    <div class="container mt-3">
        <h1 class="correrIzquierda" style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">
            Crear bitacora</h1>







        <div>
            <!------------------- SE SELECCIONA EL CLIENTE --------------------------------------------->
            <div class="box-body2" style="max-width: 80%; margin: 20px auto 0; padding: 20px;">
                <div>
                    <div class="modal-header modalHeaderColor">
                        <h4 class="modal-title">Cliente</h4>
                    </div>

                    <br>

                    <button class="btn btn-primary btnEscogerCli correrIzquierda" id="btnMostrarTablaCli" style="text-align: left; font-family: 'Roboto Condensed', sans-serif !important;">
                        Buscar Cliente
                    </button>

                    <button class="btn btn-primary btnAgregarCli correrIzquierda" data-bs-toggle="modal" data-bs-target="#modalAddClient" style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">
                        Agregar Cliente
                    </button>

                </div>





                <!--MODAL PARA AGREGAR USUARIO-->
                <div class="modal fade" id="modalAddClient" role="dialog" data-bs-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">


                            <form role="form" method="POST" enctype="multipart/form-data">

                                <div class="modal-header modalHeaderColor">
                                    <h4 class="modal-title">Agregar Cliente</h4>
                                </div>


                                <div class="modal-body">

                                    <div class="box-body modalCli">

                                        <!--AGREGAR DE CEDULA-->




                                        <div class="row mb-3">
                                            <div class="input-group">
                                                <label for="AggEquipo" class="col-sm-2 col-form-label">Cedula</label>

                                                <div class="col-sm-10">
                                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El número de cédula debe tener minimo 1 caracteres y 30 maximo." class="form-control input-lg" id="idCliente" name="idCliente" placeholder="Ingresar cédula o cedula juridica" style="border-radius: 5px;" pattern="[A-Za-z0-9]{1,30}" required>
                                                </div>

                                            </div>
                                        </div>







                                        <!--AGREGAR DE NOMBRE DE CLIENTE-->
                                        <div class="row mb-3">

                                            <div class="input-group">
                                                <label for="AggEquipo" class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Ingresar el nombre" id="nomCliente" name="nomCliente" title="El nombre debe tener minimo 5 caracteres alfabeticos y 20 maximo." style="border-radius: 5px;" pattern="[A-Za-z\s]{5,20}" required>
                                                </div>

                                            </div>

                                        </div>





                                        <!--AGREGAR DE TELEFONO DEL CLIENTE-->
                                        <div class="row mb-3">

                                            <div class="input-group">
                                                <label for="AggEquipo" class="col-sm-2 col-form-label">Teléfono</label>

                                                <div class="col-sm-10">
                                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El número de teléfono no puede tener más de 15 caracteres, incluyendo espacios." class="form-control input-lg" id="telefonoCli" name="telefonoCli" placeholder="Ingresar el teléfono" pattern="[A-Za-z0-9]{5,30}">
                                                </div>

                                            </div>

                                        </div>






                                        <!--AGREGAR DE EMAIL-->
                                        <div class="row mb-3">

                                            <div class="input-group">
                                                <label for="AggEquipo" class="col-sm-2 col-form-label">Correo</label>

                                                <div class="col-sm-10">
                                                    <input style="width: 100%;" type="email" class="form-control" data-bs-toggle="tooltip" class="form-control input-lg" id="email" name="email" placeholder="Ingresar correo electrónico">
                                                </div>

                                            </div>

                                        </div>






                                        <div class="form-group">

                                            <div class="input-group">

                                                <label for="AggEquipo" class="col-sm-2 col-form-label">Dirección</label>
                                                <div class="input-group">
                                                    <textarea style="resize: none; height:60px;width: 100%;" class="form-control input-lg " rows="2" id="direccion" name="direccion" placeholder="Ingresar dirección"></textarea>
                                                </div>


                                            </div>

                                        </div>




                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Salir</button>
                                    <button type="submit" class="btn btn-success pull-right" data-dismiss="modal">Guardar</button>
                                </div>

                                <?php
                                $direccion = "noEjecutar";
                                $addClient = new ControllerClient;
                                $addClient->ctrCreateClient($direccion);

                                ?>

                            </form>
                        </div>
                    </div>
                </div>













                <!-------------------------- Muestra los clientes-------------------------------------------------------->
                <div class="box-body2" style="max-width: 80%; margin: 20px auto 0; padding: 20px;">
                    <div class="table-responsive roboto correrIzquierda" style="display: none;" id="tabla-containerCli">
                        <table class="table tableMostrarCli" id="tablaCli" data-sort="table">
                            <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombre Completo</th>
                                    <th>Telefono Cliente</th>
                                    <th>Email</th>
                                    <th>Direccion</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $item = null;
                                $valor = null;

                                $client = ControllerClient::ctrShowClient($item, $valor);


                                foreach ($client as $key => $client1) { ?>
                                    <tr>

                                        <td>
                                            <?php echo $client1['cedula']; ?>
                                        </td>
                                        <td>
                                            <?php echo $client1['nomCliente']; ?>
                                        </td>
                                        <td>
                                            <?php echo $client1['telefonoCli']; ?>
                                        </td>
                                        <td>
                                            <?php echo $client1['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $client1['direccion']; ?>
                                        </td>
                                        <td>

                                            <div class="btn-group">
                                                <button class="btn btn-success btnSelecCli btnUpdate btnUpdateClient" idClient=<?php echo $client1['cedula']; ?> onclick="mostrarFormularioCli()">Seleccionar</button>
                                            </div>

                                        </td>


                                    </tr>

                                <?php } ?>


                            </tbody>

                        </table>
                    </div>
                </div>

         



                <!-------------------------- Formulario MUESTRA los datos del cliente-------------------------------------------------------->

                <div class="box-body2" style="max-width: 80%; margin: 20px auto 0; padding: 20px;">
                    <form action="controller/bitacoraController.php" method="POST" id="formularioCliente" style="display: none;">
                        <div class="mb-3">
                            <label for="cedula" class="form-label">Cedula:</label>
                            <input style="width: 100%;" type="text" class="form-control" id="idClientem" name="idClientem" readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input style="width: 100%;" type="text" class="form-control" id="nomClientem" name="nomClientem" readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono:</label>
                            <input style="width: 100%;" type="text" class="form-control" id="telefonoClim" name="telefonoClim" readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input style="width: 100%;" type="text" class="form-control" id="emailm" name="emailm" readonly required>
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label">Direccion:</label>
                            <input style="width: 100%;" type="text" class="form-control" id="direccionm" name="direccionm" readonly required>
                        </div>
        
        
        
                        <br>
 <!-----------------------------------------SUCURSAL--------------------------->

        <div class="box-body">
            <div class="modal-header modalHeaderColor">
                <h4 class="modal-title">Sucursal para el equipo</h4>
            </div>

            <br>
            <div class="form-group">
                <?php
                $item = null;
                $valor = null;
                $sucursal = ControllerSucursal::ctrShowSucursal($item, $valor);
                ?>
                <div class="input-group">

                    <span class="input-group-addon"></i></span>

                    <select class="form-select input-lg" id="idSucursalActivo" style="border-radius: 5px;" name="idSucursalActivo" required>
                        <option value="">Seleccionar sucursal.</option>
                        <?php foreach ($sucursal as $sucursal1) { ?>
                            <option value=<?php echo $sucursal1['codigo'] ?>><?php echo $sucursal1['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>

        </div>


        <br>


        <div>
            <!--------------- EQUIPO-------------------------------->

            <div class="box-body" >
               

                    <div class="modal-header modalHeaderColor">
                        <h4 class="modal-title">Informacion del equipo</h4>
                    </div>

                    </br>
                    <div class="modal-body">

                        <div class="box-body modalSuc">




                            <!--AGREGAR TIPO DE EQUIPO-->
                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="AggEquipo" class="col-sm-2 col-form-label">Tipo equipo</label>
                                    <select for="AggEquipo" class="form-select  col-sm-10" style="border-radius: 5px;" id="tipoEquipo" name="tipoEquipo" required>
                                        <option value="">Selecionar el tipo de equipo.</option>
                                        <option value="Celular">Celular</option>
                                        <option value="Computadora">Computadora</option>
                                        <option value="Impresora">Impresora</option>
                                        <option value="Celular">Tablet</option>
                                        <option value="Parlante">Parlante</option>
                                        <option value="Parlante">Audifonos</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>





                            <!--AGREGAR DE serial-->
                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="AggEquipo" class="col-sm-2 col-form-label">Serie</label>
                                    <div class="col-sm-10">
                                        <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" id="serialEquipo" name="serialEquipo" style="border-radius: 5px;" placeholder="Ingresar el serial" title="El seria debe tener minimo 2 caracteres alfabeticos y 30 maximo." style="border-radius: 5px;" pattern="[A-Za-z0-9\s]{2,30}" >
                                    </div>
                                </div>
                            </div>

                            <!--AGREGAR MARCA-->
                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="AggEquipo" class="col-sm-2 col-form-label">Marca</label>
                                    <div class="col-sm-10">
                                        <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Ingresar la marca" id="marcaEquipo" name="marcaEquipo" style="border-radius: 5px;" placeholder="Ingresar la marca" title="El marca debe tener minimo 2 caracteres alfabeticos y 30 maximo." style="border-radius: 5px;" pattern="[A-Za-z0-9]{2,30}" >
                                    </div>
                                </div>
                            </div>

                            <!--AGREGAR DE Modelo-->
                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="AggEquipo" class="col-sm-2 col-form-label">Modelo</label>
                                    <div class="col-sm-10">
                                        <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Ingresar el modelo" id="modeloEquipo" name="modeloEquipo" style="border-radius: 5px;" placeholder="Ingresar el modelo" title="El modelo debe tener minimo 2 caracteres alfabeticos y 30 maximo." style="border-radius: 5px;" pattern="[A-Za-z0-9]{2,30}" >
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="AggEquipo" class="col-sm-2 col-form-label">Estado</label>
                                    <div class="col-sm-10">
                                        <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Estado" id="estadoEquipoE" name="estadoEquipoE" style="border-radius: 5px;" placeholder="Estado" style="border-radius: 5px;">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="AggEquipo" class="col-sm-2 col-form-label">Contraseña</label>
                                    <div class="col-sm-10">
                                        <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" id="contrasenaEquipo" name="contrasenaEquipo" style="border-radius: 5px;" placeholder="Contraseña" style="border-radius: 5px;">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="AggEquipo" class="col-sm-2 col-form-label">Otros</label>
                                    <div class="col-sm-10">
                                        <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" id="otraInfoEquipo" name="otraInfoEquipo" style="border-radius: 5px;" placeholder="Otra informacion" style="border-radius: 5px;">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>




            </div>
        </div>



<!------ OTROS DATOS DE LA BITACORA--->
<div class="box-bod">
    <div class="modal-header modalHeaderColor">
        <h4 class="modal-title">Fecha ingreso</h4>
            <input type="date" id="FingresoEquipo" name="FingresoEquipo">
    
    </div>
</div>

<!-- da la fecha local al input -->
<script>
    // Obtener el elemento de entrada de fecha
    var FingresoEquipoInput = document.getElementById('FingresoEquipo');

    // Obtener la fecha actual en formato ISO (YYYY-MM-DD)
    var currentDate = new Date().toISOString().split('T')[0];

    // Establecer el valor predeterminado del campo de fecha
    FingresoEquipoInput.value = currentDate;
</script>


<br>
<div class="box-bod">
    <div class="modal-header modalHeaderColor">
        <h4 class="modal-title">Datos de solicitud</h4>
            <textarea id="solicitudR" name="solicitudR" style="width: 100%; padding: 15px; margin-top: 2px; text-align: left; height: 200px; overflow-y: auto;"></textarea>
        </div>
    </div>





<br>
<div class="box-bod">
    <div class="modal-header modalHeaderColor">
        <h4 class="modal-title">Estado del equipo</h4>
            <textarea id="estadoEquipoR" name="estadoEquipoR" style="width: 100%; padding: 15px; margin-top: 2px; text-align: left; height: 200px; overflow-y: auto;"></textarea>
        </div>
    </div>


    <br>
    <div class="box-bod">
    <div class="modal-header modalHeaderColor">
        <h4 class="modal-title">Estado de la bitacora</h4>
            <textarea id="InfoReparacionEquipo" name="InfoReparacionEquipo" style="width: 100%; padding: 15px; margin-top: 2px; text-align: left; height: 200px; overflow-y: auto;"></textarea>
        </div>
    </div>


    <br>
<!----gastos------>

<div class="box-body">
    <h4 class="modal-title">Costos</h4>
    <div class="modal-header modalHeaderColor" style="display: flex; flex-direction: column;">

        <div style="margin-top: 10px;">
            <label for="bono">Abono:</label>
            <input type="number" id="bono" name="bono" class="form-control" style="width: 100%; padding: 10px; box-sizing: border-box;" pattern="[0-9]+(\.[0-9]{1,2})?" title="Solo se permiten números y máximo dos valores después del punto">
        </div>
        
        <div style="margin-top: 10px;">
            <label for="saldo">Saldo:</label>
            <input type="number" id="saldo" name="saldo" class="form-control" style="width: 100%; padding: 10px; box-sizing: border-box;" pattern="[0-9]+(\.[0-9]{1,2})?" title="Solo se permiten números y máximo dos valores después del punto">
        </div>
        
        <div style="margin-top: 10px;">
            <label for="monto">Monto:</label>
            <input type="number" id="monto" name="monto" class="form-control" style="width: 100%; padding: 10px; box-sizing: border-box;" pattern="[0-9]+(\.[0-9]{1,2})?" title="Solo se permiten números y máximo dos valores después del punto">
        </div>
        
        <div style="margin-top: 10px;">
            <label for="gastos">Gastos:</label>
            <input type="number" id="gastos" name="gastos" class="form-control" style="width: 100%; padding: 10px; box-sizing: border-box;" pattern="[0-9]+(\.[0-9]{1,2})?" title="Solo se permiten números y máximo dos valores después del punto">
        </div>

    </div>
</div>






                    <br>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>


            </div>
        </div>
























    <?php

    $crearBitacora = new ControladorBitacora();

    ?>




    </div>



</div>




</div>