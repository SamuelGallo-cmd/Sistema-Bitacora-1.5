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