<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/user.css">



<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<div id="container pt-4" style="margin-top: 100px;">

  <div class="container mt-3">
    <h2 class="correrIzquierda" style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">Control
      de Clientes</h2>

    <button class="btn btn-primary btnAgregarCli correrIzquierda" data-bs-toggle="modal" data-bs-target="#modalAddClient" style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">
      Agregar Cliente
    </button>
  
    <div class="box-body">
    <br>
      <div class="table-responsive roboto correrIzquierda">
        <table class="table tableMostrar" id="tabla" data-sort="table">
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
                    <button style="margin: 5px" class="btn btn-warning btnUpdate btnUpdateClient" idClient=<?php echo $client1['cedula']; ?> data-bs-toggle="modal" data-bs-target="#modalUpdateClient"><i class="fa fa-pencil"></i></button>
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
<div class="modal fade" id="modalAddClient" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="POST" enctype="multipart/form-data">

        <div class="modal-header modalHeaderColor">
          <h4 class="modal-title">Agregar Cliente</h4>
        </div>

        </br>
        <div class="modal-body">

          <div class="box-body modalCli">

            <!--AGREGAR DE CEDULA-->




            <div class="row mb-3">
  <div class="input-group">
    <label for="AggUser" class="col-sm-2 col-form-label">Cedula</label>

    <div class="col-sm-10">
      <input style="width: 100%;" type="text" class="form-control input-lg" data-bs-toggle="tooltip" title="El número de cédula debe tener mínimo 1 carácter y 30 como máximo." id="idCliente" name="idCliente" placeholder="Ingresar cédula o cedula juridica" style="border-radius: 5px;" pattern="[A-Za-z0-9\s]{1,30}" required>
    </div>
  </div>
</div>








            <!--AGREGAR DE NOMBRE DE CLIENTE-->
            <div class="row mb-3">

              <div class="input-group">
                <label for="AggUser" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                  <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" placeholder="Ingresar el nombre" id="nomCliente" name="nomCliente" title="El nombre debe tener minimo 5 caracteres alfabeticos y 20 maximo." style="border-radius: 5px;" pattern="[A-Za-z\s]{5,20}" required>
                </div>

              </div>

            </div>





            <!--AGREGAR DE TELEFONO DEL CLIENTE-->
            <div class="row mb-3">

              <div class="input-group">
                <label for="AggUser" class="col-sm-2 col-form-label">Teléfono</label>

                <div class="col-sm-10">
                  <input style="width: 100%;" type="text" class="form-control" data-bs-toggle="tooltip" title="El número de teléfono no puede tener más de 15 caracteres, incluyendo espacios." class="form-control input-lg" id="telefonoCli" name="telefonoCli" placeholder="Ingresar el teléfono" pattern="[A-Za-z0-9]{5,30}">
                </div>

              </div>

            </div>






            <!--AGREGAR DE EMAIL-->
            <div class="row mb-3">

              <div class="input-group">
                <label for="AggUser" class="col-sm-2 col-form-label">Correo</label>

                <div class="col-sm-10">
                  <input style="width: 100%;" type="email" class="form-control" data-bs-toggle="tooltip" class="form-control input-lg" id="email" name="email" placeholder="Ingresar correo electrónico">
                </div>

              </div>

            </div>






            <div class="form-group">
  <div class="input-group">
    <label for="AggUser" class="col-sm-2 col-form-label">Dirección</label>
    <div class="input-group">
      <textarea style="resize: none; height: 60px; width: 100%;" class="form-control input-lg" rows="2" id="direccion" name="direccion" placeholder="Ingresar dirección" ></textarea>
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
        $direccion = "cliente";
        $addClient = new ControllerClient;
        $addClient->ctrCreateClient($direccion);

        ?>

      </form>
    </div>
  </div>
</div>

<!--*************************** MODAL MODIFICAR CLIENTE ***************************-->

<div class="modal fade" id="modalUpdateClient" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="POST" enctype="multipart/form-data">

        <div class="modal-header modalHeaderColor">
          <h4 class="modal-title">Editar Cliente</h4>
        </div>


        <div class="modal-body">

          <div class="box-body modalCli">

            <!--MODIFICAR DE CEDULA-->



            <div class="row mb-3">

              <div class="input-group">

                <label for="AggUser" class="col-sm-2 col-form-label">Cedula</label>
                <input type="text" class="form-control input-lg" id="idClientem" name="idClientem" style="border-radius: 5px;" placeholder="Editar cédula o cedula juridica" readonly required>


              </div>
              <br>
            </div>






            <!--MODIFCAR DE NOMBRE DE CLIENTE-->
            <div class="form-group">

              <div class="input-group">

                <label for="AggUser" class="col-sm-2 col-form-label">Nombre</label>
                <input type="text" class="form-control input-lg" id="nomClientem" name="nomClientem" style="border-radius: 5px;" placeholder="Editar nombre" required>

              </div>
              <br>
            </div>

            <!--MODIFICAR DE TELEFONO-->
            <div class="form-group">

              <div class="input-group">
                <label for="AggUser" class="col-sm-2 col-form-label">Teléfono</label>
                <input type="text" class="form-control input-lg" id="telefonoClim" name="telefonoClim" style="border-radius: 5px;" placeholder="Editar número de teléfono">

              </div>
              <br>
            </div>

            <!--MODIFICAR DE EMAIL-->
            <div class="form-group">

              <div class="input-group">

                <label for="AggUser" class="col-sm-2 col-form-label">Correo</label>
                <input type="email" class="form-control input-lg" id="emailm" name="emailm" style="border-radius: 5px;" placeholder="Editar correo electrónico">

              </div>
              <br>
            </div>

            <!--MODIFICAR DE DIRECCION-->
            <div class="form-group">

              <div class="input-group">

                <label for="AggUser" class="col-sm-2 col-form-label">Dirección</label>
                <input type="text" class="form-control input-lg" id="direccionm" name="direccionm" style="border-radius: 5px;" placeholder="Editar dirección">

              </div>
              <br>
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success pull-right" data-dismiss="modal">Guardar</button>
        </div>

        <?php
        $updateClient = new ControllerClient;
        $updateClient->ctrUpdateClient();

        ?>

      </form>
    </div>
  </div>
</div>

