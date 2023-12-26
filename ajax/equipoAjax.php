<?php

require_once "../controller/equipoController.php";
require_once "../model/equipoModelo.php";

class AjaxEquipo{
	/*=============================================
	EDITAR CLIENTE
	=============================================*/	
	public $idReparacion;

	public function ajaxUpdateEquipo(){

		$item = "idReparacion";
		$valor = $this->idReparacion;

		$respuesta = ControladorEquipo::ctrMostrarEquipos($item, $valor);

		echo json_encode($respuesta);
	}
}
/*=============================================
EDITAR CLIENTE
=============================================*/	
if(isset($_POST["serialEquipo"])){
	$client = new AjaxEquipo();
	$client -> idReparacion = $_POST["serialEquipo"];
	$client -> ajaxUpdateEquipo();
}