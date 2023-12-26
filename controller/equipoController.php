<?php

class ControladorEquipo
{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarEquipos($item, $valor)
	{

		$tabla = "equipo";

		$respuesta = ModeloEquipo::mdlMostrarEquipo($tabla, $item, $valor);

		return $respuesta;
	}








	static public function ctrNameEqui($cedula)
	{

		$respuesta = ModeloEquipo::mdlNameEqui($cedula);
		return $respuesta;
	}



	static public function ctrCreateEquipo()
	{
		$equipos = 'equipos';


		if (isset($_POST["serialEquipo"])) {
			if (preg_match('/^[a-zA-Z0-9]{1,30}$/', $_POST["serialEquipo"])) {
				if (preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,45}$/', $_POST["marcaEquipo"])) {
					if (preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,45}$/', $_POST["modeloEquipo"])) {
						if (preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,200}$/', $_POST["estadoEquipo"])) {




							if (preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,200}$/', $_POST["contrasenaEquipo"])) {

								$table = "equipo";






								$datas = array(
									"serie" => $_POST["serialEquipo"],
									"tipoEquipo" => $_POST["tipoEquipo"],
									"marca" => $_POST["marcaEquipo"],
									"modelo" => $_POST["modeloEquipo"],
									"estado" => $_POST["estadoEquipo"],
									"contrasena" => $_POST["contrasenaEquipo"],
									"otros" => $_POST["otraInfoEquipo"]
								);

								$respuesta = ModeloEquipo::mdlAddEqui($table, $datas);

								if ($respuesta == "ok") {
									echo "<script>
											
												Swal.fire({
													title: 'El equipo se agregó correctamente',
													icon: 'success',
												}).then((result) => {
													window.location = '$equipos';
												})

											</script>";
								} else {

									echo "<script>
											
											Swal.fire({
												title: 'No se puede agregar el equipo',
												icon: 'error',
											}).then((result) => {
												window.location = '$equipos';
											})
											</script>";
								}
							}
						}
					}
				}
			}
		}
	}



	static public function ctrUpdateEquipo()
	{

		$equipos = 'equipos';
		if (isset($_POST["idReparacionm"])) {

			if (preg_match('/^[a-zA-Z0-9]{1,30}$/', $_POST["serialEquipom"])) {
				if (preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,45}$/', $_POST["marcaEquipom"])) {
					if (preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,45}$/', $_POST["modeloEquipom"])) {


						if (preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,200}$/', $_POST["estadoEquipom"])) {

							if (preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,200}$/', $_POST["contrasenaEquipom"])) {

								$table = "equipo";

								$datas = array(
									"idReparacion"=>$_POST["idReparacionm"],
									"serie" => $_POST["serialEquipom"],
									"marca" => $_POST["marcaEquipom"],
									"modelo" => $_POST["modeloEquipom"],
									"estado" => $_POST["estadoEquipom"],
									"contrasena" => $_POST["contrasenaEquipom"],
									"otros" => $_POST["otraInfoEquipom"]
								);

								$respuesta = ModeloEquipo::mdlUpdate($table, $datas);

								if ($respuesta == "ok") {
									echo "<script>
												
													Swal.fire({
														title: 'El equipo se modifico correctamente',
														icon: 'success',
													}).then((result) => {
														window.location = '$equipos';
													})
	
												</script>";
								} else {

									echo "<script>
												
												Swal.fire({
													title: 'No se pudo modificar el equipo',
													icon: 'error',
												}).then((result) => {
													window.location = '$equipos';
												})
												</script>";
								}
							}
						}
					}
				}
			}
		}
	}
}
