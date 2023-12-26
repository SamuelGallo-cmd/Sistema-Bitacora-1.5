
<?php
require_once __DIR__ . '/../model/equipoModelo.php';
require_once __DIR__ . '/../model/bitacoraModelo.php';


if (session_status() == PHP_SESSION_NONE ) {
    session_start();


	$idClientem = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $idClientem = $_POST['idClientem'];
	$idSucursal = $_POST['idSucursalActivo'];
	$tipoEquipo = $_POST['tipoEquipo'];
	$marcaEquipo = $_POST['marcaEquipo'];
	$serialEquipo = $_POST['serialEquipo'];
	$informacion = $_POST['solicitudR']; 

	$modeloEquipo = $_POST['modeloEquipo'];
	$estadoEquipoE = $_POST['estadoEquipoE'];
	$contrasenaEquipo = $_POST['contrasenaEquipo'];
	$otraInfoEquipo = $_POST['otraInfoEquipo'];
	$FingresoEquipo = $_POST['FingresoEquipo'];
	$estadoEquipoR = $_POST['estadoEquipoR'];
	$InfoReparacionEquipo = $_POST['InfoReparacionEquipo'];
	
	$bono = $_POST['bono'];
	$saldo = $_POST['saldo'];
	$monto = $_POST['monto'];
	$gastos = $_POST['gastos'];




    $respuesta = ControladorBitacora::ctrCrearBitacora(
		$idClientem,$idSucursal,$tipoEquipo,$marcaEquipo,$serialEquipo,$informacion,$modeloEquipo,
		$estadoEquipoE,$contrasenaEquipo,$otraInfoEquipo,$FingresoEquipo,$estadoEquipoR,
		$InfoReparacionEquipo,$bono,$saldo,$monto,$gastos
	);

    // Devuelve la respuesta en formato JSON
   // echo json_encode(array('success' => ($respuesta == 'ok'), 'error' => ($respuesta != 'ok') ? $respuesta : null));
}
}










class ControladorBitacora{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarBitacoras($item, $valor){

		$tabla = "bitacora";

		$respuesta = ModeloBitacora::mdlMostrarBitacoras($tabla, $item, $valor);

		return $respuesta;

	}


	static public function ctrUnaBitacora($item){

		$respuesta= ModeloBitacora::bitacoraConParametro($item);

		return $respuesta;
	}

	static public function ctrCrearBitacora($idClientem,$idSucursal,$tipoEquipo,$marcaEquipo,$serialEquipo,$informacion,$modeloEquipo,
	$estadoEquipoE,$contrasenaEquipo,$otraInfoEquipo,$FingresoEquipo,$estadoEquipoR,
	$InfoReparacionEquipo,$bono,$saldo,$monto,$gastos){
		//"ctrCreateClient", la cual es responsable de agregar un nuevo cliente en la base de datos


/**					Crea el registro del equipo primero						 */
			if(!is_null($idClientem)){
				$table = "equipo";
		
				$datas = array(
				"serie" => $serialEquipo,
				"marca" => $marcaEquipo, 
				"modelo" => $modeloEquipo,
				"estado" => $estadoEquipoE,
				"contrasena" => $contrasenaEquipo,
				"otros" => $otraInfoEquipo
				);


				$respuesta = ModeloEquipo::mdlAddEquipo($table, $datas);
				
				
				
				if ($respuesta == "ok") {
					$respuesta = ModeloEquipo::ultimoEquipo();
					if(!is_null($respuesta)){
						$table = "bitacora";
		
						$datas = array(
						"tipoEquipo" => $tipoEquipo,
						"idSucursal" => $idSucursal,
						"informacion" => $informacion, 
						"estado" => $estadoEquipoR,
						"fechaIngreso" => $FingresoEquipo,
						"monto" => $monto,
						"codigo_equipo" => $respuesta,
						"bono"=>$bono,
						"saldo"=>$saldo,
						"gastos"=>$gastos,
						"detalleReparacion"=>$InfoReparacionEquipo,
						"empleado_id"=>$_SESSION['cedula'],
						"cliente_id"=>$idClientem
						);

						$respuesta = ModeloBitacora::mdlAddBita($table, $datas);





						if($respuesta == "error" ){ // se crea correctamente la bitacora
							echo "<script>
										
							Swal.fire({
								title: 'No se puedo crear la bitacora, valide los datos',
								icon: 'error',
							})
							</script>";

						}else{

							echo "<script>

								window.location.href = '/bitacoraIngreso/extensiones/tcpdf/pdf/ticket.php?codigo='+$respuesta;

							</script>";



						}








						
					}else{
						echo " Hubo un error al crear el registro del equipo";
					}


				} else {

					echo " ERROR ";
				}




			}

	}




}