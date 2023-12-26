<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div id= "container pt-4" style="margin: 100px 0px 0px 25px;">
        <div class="content-wrapper" style="padding: 15px !important;">
            <div class="content-wrapper">
                <section class="content">
                    <h2 class="correrIzquierda" style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">Bitacoras</h2>
                    <div class="box">
                        <div class="box-header with-border correrIzquierda">
                            <a href="ingresoEquipo">
                                <button class="btn btn-primary navbar-right btnAgregarVentas" style="margin: 7px;margin-bottom: 20px; " style="text-align:left; font-family: 'Roboto Condensed', sans-serif !important;">Agregar bitacora</button>
                            </a>
                        </div>
                        <div class="box correrIzquierda" style="margin: 0px;">
                            <label for="tipoEquipo">Filtrar por tipo de equipo:</label>
                            <select id="tipoEquipo">
                                <option value="">Seleccionar el tipo de equipo</option>
                                <option value="Celular">Celular</option>
                                <option value="Computadora">Computadora</option>
                                <option value="Impresora">Impresora</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Parlante">Parlante</option>
                                <option value="Audifonos">Audífonos</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <br>
                        
                        <div class="box correrIzquierda" style="margin: 0px;"></div>
                        <div class="box-body">
                            <div class="table-responsive roboto correrIzquierda">
                                <table id="tabla" class="table table-bordered table-striped dt-responsive tablas tableMostrar" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Código bitacora</th>
                                            <th>Se.Equipo</th>
                                            <th>Cliente</th>
                                            <th>Sucursal</th>
                                            <th>Tecnico</th>
                                            <th>Tipo Equipo</th>
                                            <th>Estado</th>
                                            <th>F.Ingreso</th>
                                            <th>F.Salida</th>
                                            <th>Monto</th>
                                            <th>Bono</th>
                                            <th>Saldo</th>
                                            <th>Gastos</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $respuesta = ControladorBitacora::ctrMostrarBitacoras($item, $valor);
                                        usort($respuesta, function ($a, $b) {
                                            return $b["codigo"] - $a["codigo"];
                                        });
                                        foreach ($respuesta as $key => $value) {




                                            echo '<tr>
                                            <td>'.$value["codigo"].'</td>';



                                            $itemEquipo = "idReparacion";
                                            $valorEquipo = $value["codigo_equipo"];
                                            $respuestaClienteS2 = ControladorEquipo::ctrMostrarEquipos($itemEquipo, $valorEquipo); 
                                            echo '<td>'.$respuestaClienteS2["serie"].'</td>';       


                                            $itemCliente = "cedula";
                                            $valorCliente = $value["cliente_id"];
                                            $respuestaCliente = ControllerClient::ctrShowClient($itemCliente, $valorCliente);
                                            echo '<td>'.$respuestaCliente["nomCliente"].'</td>';
                                        
                                    
                                            $itemSucursal = "codigo";
                                            $valorSucursal = $value["idSucursal"];
                                            $respuestaCliente = ControllerSucursal::ctrShowSucursal($itemSucursal, $valorSucursal); 
                                            echo '<td>'.$respuestaCliente["nombre"].'</td>';       
                                            
                                            $itemUsuario = "cedula";
                                            $valorUsuario = $value["empleado_id"];
                                            $respuestaUsuario = ControllerUser::ctrShowUser($itemUsuario, $valorUsuario);
                                            echo '<td>'.$respuestaUsuario["nombre"].'</td>

                                            <td>'.$value["tipoEquipo"].'</td>
                                            <td>'.$value["estado"].'</td>
                                            <td>'.$value["fechaIngreso"].'</td>
                                            <td>'.$value["fechaSalida"].'</td>
                                            <td>₡ '.$value["monto"].'</td>
                                            <td>₡ '.$value["bono"].'</td>
                                            <td>₡ '.$value["saldo"].'</td>
                                            <td>₡ '.$value["gastos"].'</td>
                                                <td>
                                                    <div class="btn-group">
                                                                                <button class="btn btn-success btnImprimirFactura" codigoVenta="'.$value['codigo'].'" codigoVenta="'.$value['codigo'].'">
                                                            <a class="probar" href="extensiones/tcpdf/pdf/factura.php?codigo='.$value['codigo'].'">  <i class="fa fa-file" style="color: white;"></i></a>
                                                        </button>
                                        
                                        
                                        <button class="btn btn-info btnImprimirTicket" codigoVenta="'.$value['codigo'].'" codigoVenta="'.$value['codigo'].'">
                                                            <a class="probar" href="extensiones/tcpdf/pdf/ticket.php?codigo='.$value['codigo'].'"> <i class="fa fa-print" style="color: black;"></i></a>
                                                        </button>




                                                        <button class="btn btn-warning btnUpdate btnAbrirModal" data-bs-toggle="modal" data-bs-target="#modalUpdateBitacora" idClient="'.$value['codigo'].'">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>


                                                    </div>
                                                    
                                                </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            $eliminarBitacora = new ControladorBitacora();
                           // $eliminarBitacora  -> ctrEliminarVenta();
                            ?>       
                        </div>
                        <script>
        $(document).ready(function() {
            var tabla = $('#tabla').DataTable();

            // Agregar evento de cambio al elemento select
            $('#tipoEquipo').on('change', function() {
                // Obtener el valor seleccionado
                var tipoEquipo = $(this).val();

                // Filtrar la tabla por el tipo de equipo seleccionado
                tabla.column(5).search(tipoEquipo).draw();
            });
        });
    </script>
                    </div>
                </section>
            </div>
        </div>
        <!--*************************** MODAL MODIFICAR BITACORA ***************************-->

<div class="modal fade" id="modalUpdateBitacora" role="dialog" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">


      <form role="form" method="POST" enctype="multipart/form-data">

        <div class="modal-header modalHeaderColor">
          <h4 class="modal-title">Editar Bitacora</h4>
        </div>


        <div class="modal-body">

          <div class="box-body modalSuc">

            <!--MODIFICAR DE CODIGO-->
            <div class="form-group">
    <div class="input-group">
        <label for="AggUser" class="col-sm-2 col-form-label">Codigo</label>
        <input type="text" class="form-control input-lg" id="codigoBitacoraM2" name="codigoBitacoraM2" style="border-radius: 5px;" value="" readonly required>
  
      </div>
</div>


<br> 

<div class="form-group">
    <div class="input-group">
        <label for="AggUser" class="col-sm-2 col-form-label">Estado de la bitacora</label>
        <input type="text" class="form-control input-lg" id="estadoBitacoraM2" name="estadoBitacoraM2" style="border-radius: 5px;" value="Ingrese el estado de la bitacora" required>
  
      </div>
</div>

<br> 


<div class="form-group">
    <div class="input-group">
   
    <br> 
    <label for="AggUser" class="col-sm-2 col-form-label">Fecha de retiro</label>
        <input type="date" id="fechaSalidaM2" name="fechaSalidaM2" required>
        <br>
   
    </div>
</div>







<!-- da la fecha local al input -->
<script>
    // Obtener el elemento de entrada de fecha
    var FingresoEquipoInput = document.getElementById('fechaSalidaM2');

    // Obtener la fecha actual en formato ISO (YYYY-MM-DD)
    var currentDate = new Date().toISOString().split('T')[0];

    // Establecer el valor predeterminado del campo de fecha
    FingresoEquipoInput.value = currentDate;
</script>



<div class="form-group">
<br>
    <div class="input-group">
        <label for="AggUser2" class="col-sm-2 col-form-label">Costo</label>
        <input type="text" class="form-control input-lg" id="costoM2" name="costoM2" style="border-radius: 5px;" value="Ingrese el costo total de la reparación" required>
    </div>
</div>

<br>
            <div class="form-group">

              <div class="input-group">
              <label for="AggUser2" class="col-sm-2 col-form-label">Abono</label>
              
                <input type="text" class="form-control input-lg" id="bonoM2" name="bonoM2" style="border-radius: 5px;" value="Ingrese el total del dinero abonado" required>

              </div>

            </div>

            <br>
            <div class="form-group">

              <div class="input-group">
              <label for="AggUser2" class="col-sm-2 col-form-label">Saldo</label>
              
                <input type="text" class="form-control input-lg" id="saldoM2" name="saldoM2" style="border-radius: 5px;" value="Ingrese el total del saldo pendiente" required>

              </div>

            </div>        
            <br>        
            <div class="form-group">

<div class="input-group">
<label for="AggUser2" class="col-sm-2 col-form-label">Gastos</label>

  <input type="text" class="form-control input-lg" id="gastosM2" name="gastosM2" style="border-radius: 5px;" value="Ingrese el total del diniro invertido" required>

</div>

</div>            
            
<br>

<div class="input-group">
<label for="AggUser2" class="col-sm-2 col-form-label">Detalles de reparacion</label>

  <input type="text" class="form-control input-lg" id="reparacionM2" name="reparacionM2" style="border-radius: 5px;" value="Ingrese los detalles de la reparación" required>

</div>

</div> 


          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success pull-right" data-dismiss="modal">Guardar</button>
        </div>
        </div>



        <?php
        $updateBitacora = new ControladorBitacoraUpdate;
        $updateBitacora->ctrUpdateBitacora2();

        ?>

      </form>
    </div>
  </div>
</div>


    </div>

</body>
</html>
