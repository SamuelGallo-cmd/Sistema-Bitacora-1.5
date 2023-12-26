<?php

require_once "conexion.php";

class ModeloBitacora{

	/*=============================================
	MOSTRAR Bitacoras
	=============================================*/

	static public function mdlMostrarBitacoras($tabla, $item, $valor){

		if($valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt -> close();

		$stmt = null;

	}



	static public function mdlAddBita($table, $datas) {
		try {
			// Preparar la sentencia SQL para la inserción en la tabla
			$sentenciaSQL = Conexion::conectar()->prepare("INSERT INTO $table (
				tipoEquipo, idSucursal, informacion, estado, fechaIngreso, monto, codigo_equipo,
				bono, saldo, gastos, detalleReparacion, empleado_id, cliente_id
			) VALUES (
				:tipoEquipo, :idSucursal, :informacion, :estado, :fechaIngreso,
				:monto, :codigo_equipo, :bono, :saldo, :gastos, :detalleReparacion, :empleado_id, :cliente_id
			)");
	
			// Asociar los parámetros con los valores del arreglo $datas
			$sentenciaSQL->bindParam(":tipoEquipo", $datas["tipoEquipo"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(":idSucursal", $datas["idSucursal"], PDO::PARAM_INT);
			$sentenciaSQL->bindParam(":informacion", $datas["informacion"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(":estado", $datas["estado"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(":fechaIngreso", $datas["fechaIngreso"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(":monto", $datas["monto"], PDO::PARAM_INT);
			$sentenciaSQL->bindParam(":codigo_equipo", $datas["codigo_equipo"], PDO::PARAM_INT);
			$sentenciaSQL->bindParam(":bono", $datas["bono"], PDO::PARAM_INT);
			$sentenciaSQL->bindParam(":saldo", $datas["saldo"], PDO::PARAM_INT);
			$sentenciaSQL->bindParam(":gastos", $datas["gastos"], PDO::PARAM_INT);
			$sentenciaSQL->bindParam(":detalleReparacion", $datas["detalleReparacion"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(":empleado_id", $datas["empleado_id"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(":cliente_id", $datas["cliente_id"], PDO::PARAM_STR);
	
			// Ejecutar la inserción
			if ($sentenciaSQL->execute()) {
				// Llamada a la vista para obtener el último código de bitácora
				$sentenciaSQL = Conexion::conectar()->prepare("SELECT codigo FROM vista_ultimo_codigo_bitacora");
				$sentenciaSQL->execute();
	
				// Utilizamos fetchColumn() para obtener directamente el valor de la columna.
				$ultimoCodigo = $sentenciaSQL->fetchColumn();
	
				// Resto de tu lógica aquí...
	
				return $ultimoCodigo;
			} else {
				return "error en la inserción";
			}
		} catch (PDOException $e) {
			return "error: " . $e->getMessage();
		} finally {
			// Cerrar la conexión y liberar recursos
			$sentenciaSQL->closeCursor();
			$sentenciaSQL = null;
		}
	}
	






		static public function mdlObtenerBitacora($codigoBitacora){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM tu_tabla_bitacora WHERE codigo = :codigoBitacora");
			$stmt->bindParam(":codigoBitacora", $codigoBitacora, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}


		static public function bitacoraConParametro($parametro){
			$sentenciaSQL = Conexion::conectar()->prepare("CALL ObtenerUnaBitacora(:parametro)");
			$sentenciaSQL->bindParam(':parametro', $parametro, PDO::PARAM_INT);    
			$sentenciaSQL->execute();
		
			// Obtener el resultado como string JSON
			$jsonResult = $sentenciaSQL->fetchColumn();
		
			// Decodificar el JSON a un array asociativo de PHP
			$phpArray = json_decode($jsonResult, true);
		
			return $phpArray;
		}







		static public function mdlUpdate($table, $datas){
			//"mdlUpdate" recibe como parámetros el nombre de la tabla a actualizar y los datos a actualizar
			$sentenciaSQL = Conexion::conectar()->prepare("UPDATE $table SET  codigo = :codigo,
															estado = :estado, fechaSalida = :fechaSalida ,
															monto = :monto, bono = :bono, saldo = :saldo,
															gastos = :gastos, detalleReparacion = :detalleReparacion 
															WHERE codigo = :codigo");
			
			
			$sentenciaSQL->bindParam(':codigo', $datas["codigo"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(':estado', $datas["estado"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(':fechaSalida', $datas["fechaSalida"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(':monto', $datas["monto"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(':bono', $datas["bono"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(':saldo', $datas["saldo"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(':gastos', $datas["gastos"], PDO::PARAM_STR);
			$sentenciaSQL->bindParam(':detalleReparacion', $datas["detalleReparacion"], PDO::PARAM_STR);
			//Si la consulta se ejecuta correctamente, la función devuelve "ok", de lo contrario devuelve "error". 
			if($sentenciaSQL->execute()){
				
				return "ok";
			}else{
				return "error";
			}
	
			$sentenciaSQL -> close();
			$sentenciaSQL = null;
	
		}
	
	
		static public function ultimaBitacora(){
			$sentenciaSQL = Conexion::conectar()->prepare("CALL ObtenerUltimoIdReparacion()");
			$sentenciaSQL->execute();
		
			// Utilizamos fetchColumn() para obtener directamente el valor de la columna.
			return $sentenciaSQL->fetchColumn();
		}
		
		

}