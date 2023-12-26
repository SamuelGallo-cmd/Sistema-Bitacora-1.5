<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/sucursal.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<div id="container pt-4" style="margin-top: 100px;">

  <div class="container mt-3">
    <h2 class="correrIzquierda" style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">Control de Sucursal</h2>

    <button class="btn btn-primary btnAgregarSuc correrIzquierda" data-bs-toggle="modal" data-bs-target="#modalAddSucursal" style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">
      Agregar Sucursal
    </button>
    <div class="table-responsive roboto correrIzquierda">
    <br>
      <table class="table tableMostrar" id="tabla" data-sort="table">
        <thead>
          <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Acciones</th>

          </tr>
        </thead>

        <tbody>

          <?php
          $item = null;
          $valor = null;

          $sucursal = ControllerSucursal::ctrShowSucursal($item, $valor);


          foreach ($sucursal as $key => $sucursal1) { ?>
            <tr>

              <td><?php echo $sucursal1['codigo']; ?></td>
              <td><?php echo $sucursal1['nombre']; ?></td>
              <td><?php echo $sucursal1['direccion']; ?></td>
              <td><?php echo $sucursal1['telefono']; ?></td>
              <td><?php echo $sucursal1['email']; ?></td>

              <td>

                <div class="btn-group">
                  <button style="margin: 5px" class="btn btn-warning btnUpdate btnUpdateSucursal" idSucursal=<?php echo $sucursal1['codigo']; ?> data-bs-toggle="modal" data-bs-target="#modalUpdateSucursal"><i class="fa fa-pencil"></i></button>
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


<div class="modal fade" id="modalAddSucursal" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="POST" enctype="multipart/form-data">

        <div class="modal-header modalHeaderColor">
          <h4 class="modal-title">Agregar Sucursal</h4>
        </div>

        </br>
        <div class="modal-body">

          <div class="box-body modalSuc">



            <!--AGREGAR DE CODIGO-->
            <div class="row mb-3">

              <div class="input-group">
                <label for="AggUser" class="col-sm-2 col-form-label">Codigo Sucursal</label>


                <div class="col-sm-10">
                  <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El codigo debe tener minimo 1 caracteres numerico y 20 maximo." class="form-control input-lg" id="idSucursal" name="idSucursal" style="border-radius: 5px;" pattern="[0-9]{1,30}" placeholder="Ingresar código de la sucursal" required>
                </div>

              </div>

            </div>








            <!--AGREGAR DE NOMBRE-->
            <div class="row mb-3">

              <div class="input-group">
                <label for="AggUser" class="col-sm-2 col-form-label">Nombre</label>

                <div class="col-sm-10">
                  <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Ingresar el nombre" id="nameSucursal" name="nameSucursal" style="border-radius: 5px;" placeholder="Ingresar nombre" title="El nombre debe tener minimo 5 caracteres alfabeticos y 20 maximo." style="border-radius: 5px;" pattern="[A-Za-z\s]{5,20}" required>
                </div>



                <input type="hidden" id="sucursalId">
              </div>

            </div>

            <!--AGREGAR DE DIRECCION-->
            <div class="row mb-3">

              <div class="input-group">
                <label for="AggUser" class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-10">
                  <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" id="direccion" name="direccion" placeholder="Ingresar dirección" style="border-radius: 5px;" style="border-radius: 5px;" required>
                </div>


              </div>

            </div>


            <!--AGREGAR DE TELEFONO-->
            <div class="row mb-3">

              <div class="input-group">
                <label for="AggUser" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-10">
                  <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El número de teléfono no puede tener más de 15 caracteres, incluyendo espacios." class="form-control input-lg" id="telefonoSucursal" name="telefonoSucursal" style="border-radius: 5px;" placeholder="Ingresar numero de telefono " pattern="[A-Za-z0-9]{5,30}">
                </div>


              </div>

            </div>



            <!--AGREGAR DE EMAIL-->
            <div class="row mb-3">

              <div class="input-group">
                <label for="AggUser" class="col-sm-2 col-form-label">Correo</label>


                <div class="col-sm-10">
                  <input style="width: 100%;" type="email" class="form-control" data-bs-toggle="tooltip" class="form-control input-lg" id="emailSucursal" name="emailSucursal" placeholder="Ingresar correo electrónico">
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

        $addSucursal = new ControllerSucursal;
        $addSucursal->ctrCreateSucursal();

        ?>

      </form>
    </div>
  </div>
</div>

<!--*************************** MODAL MODIFICAR SUCURSAL ***************************-->

<div class="modal fade" id="modalUpdateSucursal" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="POST" enctype="multipart/form-data">

        <div class="modal-header modalHeaderColor">
          <h4 class="modal-title">Editar Sucursal</h4>
        </div>


        <div class="modal-body">

          <div class="box-body modalSuc">

            <!--MODIFICAR DE CODIGO-->
            <div class="form-group">

              <div class="input-group">

              <label for="AggUser" class="col-sm-2 col-form-label">Codigo</label>
                <input type="text" class="form-control input-lg" id="idSucursalm" name="idSucursalm" style="border-radius: 5px;" value="" readonly required>


              </div>

            </div>

            <!--MODIFCAR DE NOMBRE-->
            <div class="form-group">

              <div class="input-group">

              <label for="AggUser" class="col-sm-2 col-form-label">Nombre</label>
                <input type="text" class="form-control input-lg" id="nameSucursalm" name="nameSucursalm" style="border-radius: 5px;" value="Ingresar nombre" required>

              </div>

            </div>

            <!--MODIFICAR DE DIRECCION-->
            <div class="form-group">

              <div class="input-group">
              <label for="AggUser" class="col-sm-2 col-form-label">Dirección</label>
              
                <input type="text" class="form-control input-lg" id="direccionSucursalm" name="direccionSucursalm" style="border-radius: 5px;" value="Ingresar la direccion" required>

              </div>

            </div>


            <!--MODIFICAR DE TELEFONO-->
            <div class="form-group">

              <div class="input-group">
              <label for="AggUser" class="col-sm-2 col-form-label">Telefono</label>
              
                <input type="text" class="form-control input-lg" id="telefonoSucursalm" name="telefonoSucursalm" style="border-radius: 5px;" value="Ingresar el numero de telefono" required>

              </div>

            </div>

            <!--MODIFICAR DE EMAIL-->
            <div class="form-group">

              <div class="input-group">
              <label for="AggUser" class="col-sm-2 col-form-label">Correo</label>
            
                <input type="email" class="form-control input-lg" id="emailSucursalm" name="emailSucursalm" style="border-radius: 5px;" value="Ingresar correo electrónico" required>

              </div>

            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success pull-right" data-dismiss="modal">Guardar</button>
        </div>

        <?php
        $updateSucursal = new ControllerSucursal;
        $updateSucursal->ctrUpdateSucursal();

        ?>

      </form>
    </div>
  </div>
</div>

