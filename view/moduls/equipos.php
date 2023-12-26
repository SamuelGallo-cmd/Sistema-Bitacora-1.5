<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/clients.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<div id="container pt-4" style="margin-top: 100px;">

    <div class="container mt-3">
        <h2 class="correrIzquierda" style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">
            Control de Equipos</h2>

        <button class="btn btn-primary btnAgregarCli correrIzquierda" data-bs-toggle="modal" data-bs-target="#modalAddEquipo" style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">
            Agregar Equipo
        </button>
        <div class="box-body">
            <div class="table-responsive roboto correrIzquierda">
                <table class="table tableMostrar" id="tabla" data-sort="table">
                    <thead>
                        <tr>
                            <th>DetalleE</th>
                            <th>Serie</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Estado</th>
                            <th>Contraseña</th>
                            <th>Otros</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $item = null;
                        $valor = null;

                        $equipo = ControladorEquipo::ctrMostrarEquipos($item, $valor);


                        foreach ($equipo as $key => $equipo1) { ?>
                            <tr>
                                <td>
                                    <?php echo $equipo1['idReparacion']; ?>
                                </td>

                                <td>
                                    <?php echo $equipo1['serie']; ?>
                                </td>
                                <td>
                                    <?php echo $equipo1['marca']; ?>
                                </td>
                                <td>
                                    <?php echo $equipo1['modelo']; ?>
                                </td>
                                <td>
                                    <?php echo $equipo1['estado']; ?>
                                </td>
                                <td>
                                    <?php echo $equipo1['contrasena']; ?>
                                </td>
                                <td>
                                    <?php echo $equipo1['otros']; ?>
                                </td>
                                <td>

                                    <div class="btn-group">
                                        <button class="btn btn-warning  btnUpdateEqui" serialEquipo=<?php echo $equipo1['idReparacion']; ?> data-bs-toggle="modal" data-bs-target="#modalUpdateEquipo"><i class="fa fa-pencil"></i></button>
                                    </div>

                                </td>


                            </tr>

                        <?php } ?>


                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>


<!--MODAL PARA AGREGAR USUARIO-->


<div class="modal fade" id="modalAddEquipo" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">


            <form role="form" method="POST" enctype="multipart/form-data">

                <div class="modal-header modalHeaderColor">
                    <h4 class="modal-title">Agregar equipo</h4>
                </div>

                </br>
                <div class="modal-body">

                    <div class="box-body modalSuc">




                        <!--AGREGAR DE serial-->
                        <div class="row mb-3">

                            <div class="input-group">
                                <label for="AggUser" class="col-sm-2 col-form-label">Serie</label>

                                <div class="col-sm-10">
                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" id="serialEquipo" name="serialEquipo" style="border-radius: 5px;" placeholder="Ingresar el serial" title="El seria debe tener minimo 2 caracteres alfabeticos y 30 maximo." style="border-radius: 5px;" pattern="[A-Za-z0-9]{2,30}" required>
                                </div>




                            </div>

                        </div>

                        <!--AGREGAR MARCA-->
                        <div class="row mb-3">

                            <div class="input-group">
                                <label for="AggUser" class="col-sm-2 col-form-label">Marca</label>

                                <div class="col-sm-10">
                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Ingresar la marca" id="marcaEquipo" name="marcaEquipo" style="border-radius: 5px;" placeholder="Ingresar la marca" title="El marca debe tener minimo 2 caracteres alfabeticos y 30 maximo." style="border-radius: 5px;" pattern="[A-Za-z0-9]{2,30}" required>
                                </div>


                            </div>

                        </div>







                        <!--AGREGAR DE Modelo-->


                        <div class="row mb-3">

                            <div class="input-group">
                                <label for="AggUser" class="col-sm-2 col-form-label">Modelo</label>

                                <div class="col-sm-10">
                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Ingresar el modelo" id="modeloEquipo" name="modeloEquipo" style="border-radius: 5px;" placeholder="Ingresar el modelo" title="El modelo debe tener minimo 2 caracteres alfabeticos y 30 maximo." style="border-radius: 5px;" pattern="[A-Za-z0-9]{2,30}" required>
                                </div>

                            </div>

                        </div>
















                        <div class="row mb-3">

                            <div class="input-group">
                                <label for="AggUser" class="col-sm-2 col-form-label">Estado</label>

                                <div class="col-sm-10">
                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Estado" id="estadoEquipo" name="estadoEquipo" style="border-radius: 5px;" placeholder="Estado" style="border-radius: 5px;">
                                </div>

                            </div>

                        </div>




                        <div class="row mb-3">

                            <div class="input-group">
                                <label for="AggUser" class="col-sm-2 col-form-label">Contraseña</label>

                                <div class="col-sm-10">
                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" id="contrasenaEquipo" name="contrasenaEquipo" style="border-radius: 5px;" placeholder="Contraseña" style="border-radius: 5px;">
                                </div>

                            </div>

                        </div>




                        <div class="row mb-3">

                            <div class="input-group">
                                <label for="AggUser" class="col-sm-2 col-form-label">Otros</label>

                                <div class="col-sm-10">
                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" id="otraInfoEquipo" name="otraInfoEquipo" style="border-radius: 5px;" placeholder="Otra informacion" style="border-radius: 5px;">
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

                $addEquipo = new ControladorEquipo;
                $addEquipo->ctrCreateEquipo();

                ?>
            </form>
        </div>
    </div>
</div>



<!--**************************************************** MODAL MODIFICAR EQUIPO ***************************-->

<div class="modal fade" id="modalUpdateEquipo" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">


            <form role="form" method="POST" enctype="multipart/form-data">





                <div class="modal-content">


                    <form role="form" method="POST" enctype="multipart/form-data">

                        <div class="modal-header modalHeaderColor">
                            <h4 class="modal-title">Editar equipo</h4>
                        </div>

                        </br>
                        <div class="modal-body">

                            <div class="box-body modalSuc">

                            <div class="row mb-3">

<div class="input-group">
    <label for="AggUser" class="col-sm-2 col-form-label">Consecutivo</label>

    <div class="col-sm-10">
        <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" id="idReparacionm" name="idReparacionm" style="border-radius: 5px;" placeholder="Ingresar el serial" title="El seria debe tener minimo 2 caracteres alfabeticos y 30 maximo." style="border-radius: 5px;" required>
    </div>




</div>

</div>

                                <div class="row mb-3">

                                    <div class="input-group">
                                        <label for="AggUser" class="col-sm-2 col-form-label">Serie</label>

                                        <div class="col-sm-10">
                                            <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" id="serialEquipom" name="serialEquipom" style="border-radius: 5px;" placeholder="Ingresar el serial" title="El seria debe tener minimo 2 caracteres alfabeticos y 30 maximo." style="border-radius: 5px;" readonly required>
                                        </div>




                                    </div>

                                </div>


                                <div class="row mb-3">

                                    <div class="input-group">
                                        <label for="AggUser" class="col-sm-2 col-form-label">Marca</label>

                                        <div class="col-sm-10">
                                            <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Ingresar la marca" id="marcaEquipom" name="marcaEquipom" style="border-radius: 5px;" placeholder="Ingresar la marca" title="El marca debe tener minimo 2 caracteres alfabeticos y 30 maximo." style="border-radius: 5px;" pattern="[A-Za-z0-9\s¡!@#$%^&*()_+-=,./<>?;:'" {}\[\]~`|\\]{2,30}" required>
                                        </div>


                                    </div>

                                </div>










                                <div class="row mb-3">

                                    <div class="input-group">
                                        <label for="AggUser" class="col-sm-2 col-form-label">Modelo</label>

                                        <div class="col-sm-10">
                                            <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Ingresar el modelo" id="modeloEquipom" name="modeloEquipom" style="border-radius: 5px;" placeholder="Ingresar el modelo" title="El modelo debe tener minimo 2 caracteres alfabeticos y 30 maximo." style="border-radius: 5px;" pattern="[A-Za-z0-9\s¡!@#$%^&*()_+-=,./<>?;:'" {}\[\]~`|\\]{2,20}" required>
                                        </div>

                                    </div>

                                </div>





















                                <div class="row mb-3">

                                    <div class="input-group">
                                        <label for="AggUser" class="col-sm-2 col-form-label">Estado</label>

                                        <div class="col-sm-10">
                                            <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Estado" id="estadoEquipom" name="estadoEquipom" style="border-radius: 5px;" placeholder="Estado" style="border-radius: 5px;" required>
                                        </div>

                                    </div>

                                </div>




                                <div class="row mb-3">

                                    <div class="input-group">
                                        <label for="AggUser" class="col-sm-2 col-form-label">Contraseña</label>

                                        <div class="col-sm-10">
                                            <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" id="contrasenaEquipom" name="contrasenaEquipom" style="border-radius: 5px;" placeholder="Contraseña" style="border-radius: 5px;">
                                        </div>

                                    </div>

                                </div>




                                <div class="row mb-3">

                                    <div class="input-group">
                                        <label for="AggUser" class="col-sm-2 col-form-label">Otros</label>

                                        <div class="col-sm-10">
                                            <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" id="otraInfoEquipom" name="otraInfoEquipom" style="border-radius: 5px;" placeholder="Otra informacion" style="border-radius: 5px;">
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
                        $updateEquipo = new ControladorEquipo;
                        $updateEquipo->ctrUpdateEquipo();

                        ?>

                    </form>
                </div>

        </div>
    </div>