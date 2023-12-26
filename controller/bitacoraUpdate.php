
<?php

require_once __DIR__ . '/../model/bitacoraModelo.php';


class ControladorBitacoraUpdate{
	static public function ctrUpdateBitacora2(){
		if(isset($_POST["codigoBitacoraM2"])){



			$table = "bitacora";
	
						$datas = array("codigo" => $_POST["codigoBitacoraM2"], 
										"estado" => $_POST["estadoBitacoraM2"],
										"fechaSalida" => $_POST["fechaSalidaM2"],
										"monto" => $_POST["costoM2"],
										"bono" => $_POST["bonoM2"],
										"saldo" => $_POST["saldoM2"],
										"gastos" => $_POST["gastosM2"],
										"detalleReparacion" => $_POST["reparacionM2"]
										)
										;
									
	
										$respuesta = ModeloBitacora::mdlUpdate($table,$datas);
						
						if($respuesta == "ok"){
							echo "<script>
							
								Swal.fire({
									title: 'Modificó correctamente la bitacora',
									icon: 'success',
								}).then((result) => {
									window.location = 'bitacora';
								})
							</script>";
						}else{
							echo "<script>
							
							Swal.fire({
								title: 'No se puede modificar la bitacora',
								icon: 'error',
							}).then((result) => {
								window.location = 'bitacora';
							})
							</script>";
						}
					

		}

	
			
		
	}


}