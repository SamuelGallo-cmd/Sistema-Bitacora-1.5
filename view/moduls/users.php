<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/user.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<div id="container pt-4" style="margin: 100px 0px 0px 25px;">
    <!---<div class="container mt-3">-->
    <div class="content-wrapper" style="padding: 15px !important;">
        <div class="content-wrapper">

            <section class="content">
                <h2 class="correrIzquierda" style="text-align:left; font-family: 'Roboto Condensed', sans-serif; overflow-x:auto; !important;">
                    Control de Tecnicos</h2>
                <div class="tablaUs">
                    <button class="btn btn-primary btnAgregarU correrIzquierda" style="margin:0px, 0px, 100px, 100px !important" data-bs-toggle="modal" data-bs-target="#modalAddUser" style="text-align:center; font-family: 'Roboto Condensed', sans-serif !important;">
                        Agregar Tecnico
                    </button>
                    <div class="table-responsive roboto correrIzquierda ">
                    <br>
                        <table class="table tableMostrar" id="tabla" data-sort="table">
                            <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $item = null;
                                $valor = null;
                                $empleados = ControllerUser::ctrShowUser($item, $valor);
                                foreach ($empleados as $key => $empleado1) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $empleado1['cedula']; ?>
                                        </td>
                                        <td>
                                            <?php echo $empleado1['nombre']; ?>
                                        </td>
                                        <td>
                                            <?php echo $empleado1['apellidos']; ?>
                                        </td>
                                        <td>
                                            <?php echo $empleado1['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $empleado1['role']; ?>
                                        </td>
                                        <?php
                                        if ($empleado1['estado'] == 'Activo') { ?>
                                            <td style=" padding: 5px !important;margin: 5% auto; ">✔️</td>
                                        <?php } ?>
                                        <?php
                                        if ($empleado1['estado'] == 'Inactivo') { ?>
                                            <td>❌</td>
                                        <?php } ?>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-warning btnUpdate btnUpdateUser" idEmpleado=<?php echo $empleado1['cedula']; ?> data-bs-toggle="modal" data-bs-target="#modalUpdateUser"><i class="fa fa-pencil"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>

        </div>

    </div>
    <!--Este input es para obtener el role del usuario que esta logeado para poder editar-->
    <input type="hidden" id="sessionRole" name="sessionRole" value=<?php echo $_SESSION["role"]; ?>>

    <!--MODAL PARA AGREGAR USUARIO-->
    <div class="modal fade" id="modalAddUser" role="dialog" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content ">
                <form role="form" method="POST" enctype="multipart/form-data">
                    <div class="modal-header modalHeaderColor">
                        <h4 class="modal-title">Agregar Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body modalC">

                            <!--AGREGAR DE Cedula-->
                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="AggUser" class="col-sm-2 col-form-label">Cedula</label>
                                    <div class="col-sm-10">
                                        <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El número de cédula debe tener minimo 5 caracteres y 30 maximo." class="form-control input-lg" id="idUser" name="idUser" placeholder="Ingresar cédula" pattern="[A-Za-z0-9]{5,30}" required>
                                    </div>
                                </div>
                            </div>




                            <!--AGREGAR DE NOMBRE-->
                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="AggUser" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El nombre debe tener minimo 5 caracteres alfabeticos y 20 maximo." class="form-control input-lg" id="nameUser" name="nameUser" placeholder="Ingresar el nombre" pattern="[A-Za-z\s]{5,20}" required>
                                    </div>
                                </div>
                            </div>




                            <!--AGREGAR DE APELLIDOS-->
                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="AggUser" class="col-sm-2 col-form-label">Apellidos</label>
                                    <div class="col-sm-10">
                                        <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El apellido debe tener minimo 5 caracteres alfabeticos y 30 maximo." class="form-control input-lg" id="lastNameUser" name="lastNameUser" placeholder="Ingresar apellidos" pattern="[A-Za-z\s]{5,30}" required>
                                    </div>
                                </div>
                            </div>





                            <!--AGREGAR DE EMAIL-->
                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="AggUser" class="col-sm-2 col-form-label">Correo</label>
                                    <div class="col-sm-10">
                                        <input style="width: 100%;" type="email" class="form-control" data-bs-toggle="tooltip" class="form-control input-lg" id="emailUser" name="emailUser" placeholder="Ingresar correo electrónico" required>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" style="border-radius: 5px;" class="form-control input-lg" id="passwordUser" name="passwordUser" placeholder="Ingresar contraseña">
                                </div>
                                <p id="password-error" style="color: red; font-size: 12px; display: none;">La contraseña debe tener al menos 8 caracteres.</p>
                            </div>



                            <!--AGREGAR DE TELEFONO-->
                            <div class="row mb-3">
                                <label for="AggUser" class="col-sm-2 col-form-label">Teléfono</label>
                                <div class="col-sm-10">
                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El número de teléfono no puede tener más de 15 caracteres, incluyendo espacios." class="form-control input-lg" id="telefonoUser" name="telefonoUser" placeholder="Ingresar el teléfono" pattern="[A-Za-z0-9]{5,30}">
                                </div>
                            </div>



                            <!--AGREGAR DE DIRECCION-->
                            <div class="form-group">
                                <label for="AggUser" class="col-sm-2 col-form-label">Dirección</label>
                                <div class="input-group">
                                    <textarea style="resize: none; height:60px;width: 100%;" class="form-control input-lg " rows="2" id="directionUser" name="directionUser" placeholder="Ingresar dirección"></textarea>
                                </div>
                                <hr>
                            </div>


                            <?php
                            if ($_SESSION["role"] == "Admin" || $_SESSION["role"] == "Usuario") { ?>
                                <!--AGREGAR DE ROLE-->
                                <div class="row mb-3">
                                    <div class="input-group">
                                        <select style="width: 100%;" class="form-select input-lg" style="border-radius: 5px;" id="roleUser" name="roleUser">
                                            <option value="">Selecionar perfil del usuario.</option>
                                            <option value="Admin">Administrador</option>
                                            <option value="Usuario">Usuario</option>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php
                            if ($_SESSION["role"] == "SuperAdmin") { ?>
                                <!--AGREGAR DE ROLE-->
                                <div class="form-group">
                                    <div class="input-group">
                                        <select style="width: 100%;" class="form-select input-lg" style="border-radius: 5px;" id="roleUser" name="roleUser">
                                            <option value="">Selecionar perfil del usuario.</option>
                                            <option value="SuperAdmin">Super Administrador</option>
                                            <option value="Admin">Administrador</option>
                                            <option value="Usuario">Usuario</option>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>



                            <!--AGREGAR ESTADO-->
                            <div class="form-group">
                                <div class="input-group" style="width: 100%;">
                                    <select class="form-select input-lg" id="estadoUser" id="estadoUser" name="estadoUser">
                                        <option value="">Seleccionar estado.</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal" style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">Salir</button>
                        <button type="submit" class="btn btn-success pull-right" data-dismiss="modal" style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">Guardar</button>
                    </div>
                    <?php
                    $addUser = new ControllerUser;
                    $addUser->ctrCreateUser();
                    ?>
                </form>
            </div>
        </div>
    </div>

















    <!--*************************** MODAL MODIFICAR USUARIO ***************************-->

    <div class="modal fade" id="modalUpdateUser" role="dialog" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" method="POST" enctype="multipart/form-data">
                    <div class="modal-header modalHeaderColor">
                        <h4 class="modal-title">Editar Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <!--Modificar DE Cedula-->
                        <div class="row mb-3">
                            <div class="input-group">
                                <label for="AggUser" class="col-sm-2 col-form-label">Cedula</label>
                                <div class="col-sm-10">
                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El número de cédula debe tener minimo 5 caracteres y 30 maximo." class="form-control input-lg" id="idUserm" name="idUserm" placeholder="Ingresar cédula" pattern="[A-Za-z0-9\s]{5,30}" readonly required>
                                </div>
                            </div>
                        </div>




                        <!--Modificar DE NOMBRE-->
                        <div class="row mb-3">
                            <div class="input-group">
                                <label for="AggUser" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El nombre debe tener minimo 5 caracteres alfabeticos y 20 maximo." class="form-control input-lg" id="nameUserm" name="nameUserm" placeholder="Ingresar el nombre" pattern="[A-Za-z0-9\s]{5,20}" required>
                                </div>
                            </div>
                        </div>




                        <!--Modificar DE APELLIDOS-->
                        <div class="row mb-3">
                            <div class="input-group">
                                <label for="AggUser" class="col-sm-2 col-form-label">Apellidos</label>
                                <div class="col-sm-10">
                                    <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El apellido debe tener minimo 5 caracteres alfabeticos y 20 maximo." class="form-control input-lg" id="lastNameUserm" name="lastNameUserm" placeholder="Ingresar apellidos" pattern="[A-Za-z0-9\s]{5,20}" required>
                                </div>
                            </div>
                        </div>





                        <!--Modificar DE EMAIL-->
                        <div class="row mb-3">
                            <div class="input-group">
                                <label for="AggUser" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-10">
                                    <input style="width: 100%;" type="email" class="form-control" data-bs-toggle="tooltip" class="form-control input-lg" id="emailUserm" name="emailUserm" placeholder="Ingresar correo electrónico" required>
                                </div>
                            </div>
                        </div>


                        <!--Modificar DE PASSWORD-->
                        <div class="row mb-3">
                            <div class="input-group">
                                <input type="password" style="border-radius: 5px;" data-bs-toggle="tooltip"  class="form-control input-lg" id="passwordUserm" name="passwordUserm" placeholder="Ingresar la nueva contraseña">
                                <input  style="width: 100%;" type="hidden" id="passwordActual" name="passwordActual">
                            </div>
                            <p id="password-errorm" style="color: red; font-size: 12px; display: none;">La contraseña debe tener al menos 8 caracteres.</p>
                        </div>




                        <!--Modificar DE TELEFONO-->
                        <div class="row mb-3">
                            <label for="AggUser" class="col-sm-2 col-form-label">Teléfono</label>
                            <div class="col-sm-10">
                                <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El número de teléfono no puede tener más de 15 caracteres, incluyendo espacios." class="form-control input-lg" id="telefonoUserm" name="telefonoUserm" placeholder="Ingresar el teléfono" pattern="[A-Za-z0-9\s+]{0,15}">
                            </div>
                        </div>



                        <!--Modificar DE DIRECCION-->
                        <div class="form-group">
                            <label for="AggUser" class="col-sm-2 col-form-label">Dirección</label>
                            <div class="input-group">
                                <textarea style="resize: none; height:60px;width: 100%;" class="form-control input-lg " rows="2" id="directionUserm" name="directionUserm" placeholder="Ingresar dirección"></textarea>
                            </div>
                            <hr>
                        </div>


                        <?php
                        if ($_SESSION["role"] == "Admin" || $_SESSION["role"] == "Usuario") { ?>
                            <!--Modificar DE ROLE-->
                            <div class="row mb-3">
                                <div class="input-group">
                                    <select style="width: 100%;" class="form-select input-lg" style="border-radius: 5px;" id="roleUserm" name="roleUserm">
                                        <option value="">Selecionar perfil del usuario.</option>
                                        <option value="Admin">Administrador</option>
                                        <option value="Usuario">Usuario</option>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($_SESSION["role"] == "SuperAdmin") { ?>
                            <!--Modificar DE ROLE-->
                            <div class="form-group">
                                <div class="input-group">
                                    <select style="width: 100%;" class="form-select input-lg" style="border-radius: 5px;" id="roleUserm" name="roleUserm">
                                        <option value="">Selecionar perfil del usuario.</option>
                                        <option value="SuperAdmin">Super Administrador</option>
                                        <option value="Admin">Administrador</option>
                                        <option value="Usuario">Usuario</option>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>



                        <!--Modificar ESTADO-->
                        <div class="form-group">
                            <div class="input-group" style="width: 100%;">
                                <select class="form-select input-lg" id="estadoUserm" id="estadoUserm" name="estadoUserm">
                                    <option value="">Seleccionar estado.</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-success pull-right" id="btnModificarUser" data-dismiss="modal">Guardar</button>
                    </div>
                    <?php
                    $updateUser = new ControllerUser;
                    $updateUser->ctrUpdateUser();
                    if ($_SESSION["estado"] == "Inactivo") {
                        session_destroy();
                        echo '<script>
                  window.location = "ingreso"
                  </script>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>


