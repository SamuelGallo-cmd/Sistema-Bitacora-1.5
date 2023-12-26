<?php
require_once "../../../controller/bitacoraController.php";
require_once "../../../model/bitacoraModelo.php";

require_once "../../../controller/clienteControlador.php";
require_once "../../../model/clienteModelo.php";

require_once "../../../controller/sucursalControlador.php";
require_once "../../../model/sucursalModelo.php";

require_once "../../../controller/userController.php";
require_once "../../../model/userModel.php";


require_once "../../../controller/equipoController.php";
require_once "../../../model/equipoModelo.php";


class imprimirFactura
{

	
    public $codigo;

    public function traerImpresionFactura()
    {


		
//TRAEMOS LA INFORMACIÓN DEL DETALLE FACTURA
	$itemFac = "codigo";
	$valorFac = $_GET['codigo'];//codigo es el id de la factura
	$respuestaBitacora = ControladorBitacora::ctrMostrarBitacoras($itemFac, $valorFac);


//TRAEMOS LA INFORMACIÓN DE LA TIENDA DONDE SE VEDIO

$itemSucursal = "codigo";
$valorSucursal = $respuestaBitacora["idSucursal"];

$respuestaSucursal =  ControllerSucursal::ctrShowSucursal($itemSucursal, $valorSucursal);



	//TRAEMOS LA INFORMACIÓN DEL tecnico

$itemTecnico = "cedula";
$valorTecnico = $respuestaBitacora["empleado_id"];

$respuestaTecnico = ControllerUser::ctrShowUser($itemTecnico, $valorTecnico);


	

//TRAEMOS LA INFORMACIÓN DEL EQUIPO

$itemEquipo = "idReparacion";
$valorEquipo = $respuestaBitacora["codigo_equipo"];

$respuestaEquipo =  ControladorEquipo::ctrMostrarEquipos($itemEquipo, $valorEquipo);




//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "cedula";
$valorCliente = $respuestaBitacora["cliente_id"];

$respuestaCliente = ControllerClient::ctrShowClient($itemCliente, $valorCliente);
















        require_once('tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);
        $pdf->startPageGroup();
        $pdf->SetTitle('Factura de compra');
        $pdf->AddPage();
       // $pdf->Image('images/Logo2.jpg');


       $bloqueDatosPDF = <<<EOF
       <table border="1" style="width:100%; margin-top: 10px;">
           <tr>
               <td colspan="2" style="background-color: #e6e6e6; text-align: center; font-size: 14px;">
                   <h1>MouseLamp Reporte Bitacora</h1>
               </td>
           </tr>
           <!-- Otras filas y celdas aquí según sea necesario -->
       </table>
   EOF;
   
   $pdf->writeHTML($bloqueDatosPDF, false, false, false, false, '');
   







       $bloqueDatosBitacora = <<<EOF
       <table border="1" style="width:100%; margin-top: 10px;">
       
       <br> 
       <br>   
       <tr>
      
               <td colspan="2" style="background-color: #e6e6e6; text-align: center; font-size: 14px;">
              
               <h4>Datos del ticket</h4>
               </td>
           </tr>
           <tr>
               <td style="background-color:white; width:140px">
                   <div style="font-size:8.5px; text-align:right; line-height:15px;">
                   
                   Codigo: $valorFac
                   <br>
                   Sucursal:$respuestaSucursal[nombre]
                   <br>
                     Fecha ingreso: $respuestaBitacora[fechaIngreso]
                   <br>
                     Fecha retiro: $respuestaBitacora[fechaSalida]
                     <br>
                     Tecnico: $respuestaTecnico[nombre]
                     $respuestaTecnico[apellidos]
                   <br>
                   Teléfono: (+506) 8717-0007 - 
                   <br>
                   (+506) 8690-3811
                   <br>
                      info@mouselamp.com                 
                   </div>
               </td>

           </tr>
       </table>
EOF;

       $pdf->writeHTML($bloqueDatosBitacora, false, false, false, false, '');


        
        
        
        
        $bloqueDatosCliente = <<<EOF
        <table border="1" style="width:100%; margin-top: 10px;">
		<br> 
		<br>   
		<tr>
                <td colspan="2" style="background-color: #e6e6e6; text-align: center; font-size: 14px;">
				<h4>Datos del cliente</h4>
                </td>
            </tr>
            <tr>
                <td style="background-color:white; width:140px">
                    <div style="font-size:8.5px; text-align:right; line-height:15px;">
                    

                    cedula: $respuestaCliente[cedula]
                    <br>
                    nombre: $respuestaCliente[nomCliente]
                    <br>
            Telefono:  $respuestaCliente[telefonoCli]
                    <br>
					    Correo: $respuestaCliente[email]
                        <br>
					    Direccion: $respuestaCliente[direccion]                    
					</div>
                </td>

            </tr>
        </table>
EOF;

        $pdf->writeHTML($bloqueDatosCliente, false, false, false, false, '');



        $bloqueDatosEquipo = <<<EOF
        <table border="1" style="width:100%; margin-top: 10px;">
		<tr>
        <td colspan="2" style="background-color: #e6e6e6; text-align: center; font-size: 14px; font-weight: bold; color: #000;">
        <h4>Datos del equipo</h4>
    </td>
            </tr>
            <tr>
                <td style="background-color:white; width:140px">
                    <div style="font-size:8.5px; text-align:right; line-height:15px;">
				
                    Tipo de equipo: $respuestaBitacora[tipoEquipo]
                    <br>
            Serie:  $respuestaEquipo[serie]
            <br>
            ID reparacion: $respuestaEquipo[idReparacion]
                    <br>
					    Marca: $respuestaEquipo[marca]
                        <br>
					    Modelo: $respuestaEquipo[modelo]
                        <br>
					    Estado: $respuestaEquipo[estado]                    
                        <br>
					    Contraseña: $respuestaEquipo[contrasena]
                        <br>
					    Otros detalles del equipo: $respuestaEquipo[otros]                     
					</div>
                </td>

            </tr>
        </table>
EOF;

        $pdf->writeHTML($bloqueDatosEquipo, false, false, false, false, '');


        $bloqueDatosReparacion = <<<EOF
        <table border="1" style="width:100%; margin-top: 10px;">
		<tr>
        <td colspan="2" style="background-color: #e6e6e6; text-align: center; font-size: 14px; font-weight: bold; color: #000;">
        <h4>Datos de solicitud y repación</h4>
    </td>
            </tr>
            <tr>
                <td style="background-color:white; width:140px">
                    <div style="font-size:8.5px; text-align:right; line-height:15px;">
				
                    Estado bitacora: $respuestaBitacora[estado]
                    <br> 
                    Solicitud: $respuestaBitacora[informacion]
                    <br>
                    Costo de reparación: $respuestaBitacora[monto]
                    <br>
					    Gastos de reparación: $respuestaBitacora[gastos]
                        <br>
					    bono: $respuestaBitacora[bono]
                        <br>
					    Saldo pendiente: $respuestaBitacora[saldo]                    
                        <br>
					    Detalles de reparación: $respuestaBitacora[detalleReparacion]
					</div>
                </td>

            </tr>
        </table>
EOF;

        $pdf->writeHTML($bloqueDatosReparacion, false, false, false, false, '');



 $pdf->Image('images/Logo2.jpg');







        $pdf->Output('factura.pdf', 'I');


    }
}

// Crear una instancia de la clase e imprimir la factura
$factura = new imprimirFactura();
$factura->traerImpresionFactura();
?>
