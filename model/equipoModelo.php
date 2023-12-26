<?php

require_once "conexion.php";

class ModeloEquipo{


    static public function mdlAddEquipo($table, $datas){
    

    
        $sentenciaSQL = Conexion::conectar()->prepare("INSERT INTO $table(serie,marca,modelo,estado,contrasena,otros) VALUES (:serie , :marca, :modelo,:estado,:contrasena,:otros)");
        
        $sentenciaSQL->bindParam(":serie", $datas["serie"], PDO::PARAM_STR); 
        $sentenciaSQL->bindParam(":marca", $datas["marca"], PDO::PARAM_STR);
        $sentenciaSQL->bindParam(":modelo", $datas["modelo"], PDO::PARAM_STR);
        $sentenciaSQL->bindParam(":estado", $datas["estado"], PDO::PARAM_STR);
        $sentenciaSQL->bindParam(":contrasena", $datas["contrasena"], PDO::PARAM_STR);
        $sentenciaSQL->bindParam(":otros", $datas["otros"], PDO::PARAM_STR);
        if($sentenciaSQL->execute()){
            return "ok";
        }else{
            return "error";
        
        }
        $sentenciaSQL->close();
        $sentenciaSQL = null;

    }






    static public function ultimoEquipo(){
        $sentenciaSQL = Conexion::conectar()->prepare("CALL ObtenerUltimoIdReparacion()");
        $sentenciaSQL->execute();
    
        // Utilizamos fetchColumn() para obtener directamente el valor de la columna.
        return $sentenciaSQL->fetchColumn();
    }
    










	/*=============================================
	MOSTRAR Equipos
	=============================================*/







	static public function mdlMostrarEquipo($tabla, $item, $valor){
        if($item != null){
            $sentenciaSQL = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");

            $sentenciaSQL -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $sentenciaSQL -> execute();

            return $sentenciaSQL -> fetch();
        
        }else{
            $sentenciaSQL = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $sentenciaSQL -> execute();

            return $sentenciaSQL -> fetchAll();// retorna un arreglo con todos los resultados obtenidos mediante el método fetchAll().
        }

        $sentenciaSQL -> close();

        $sentenciaSQL = null;
    }
























    static public function ctrShowClient($item, $valor){

		$tabla = "equipo";
		
		$respuesta = Client::mdlShow($tabla, $item, $valor);
		return $respuesta;
	}




    static public function mdlUpdate($table, $datas){
        //"mdlUpdate" recibe como parámetros el nombre de la tabla a actualizar y los datos a actualizar
        $sentenciaSQL = Conexion::conectar()->prepare("UPDATE $table SET
                                                        serie =:serie,marca = :marca, modelo = :modelo, estado = :estado, contrasena = :contrasena, otros = :otros WHERE idReparacion = :idReparacion");
        
        $sentenciaSQL->bindParam(':idReparacion', $datas["idReparacion"], PDO::PARAM_STR);
        $sentenciaSQL->bindParam(':serie', $datas["serie"], PDO::PARAM_STR);
        $sentenciaSQL->bindParam(':marca', $datas["marca"], PDO::PARAM_STR);
        $sentenciaSQL->bindParam(':modelo', $datas["modelo"], PDO::PARAM_STR);
        $sentenciaSQL->bindParam(':estado', $datas["estado"], PDO::PARAM_STR);
        $sentenciaSQL->bindParam(':contrasena', $datas["contrasena"], PDO::PARAM_STR);
        $sentenciaSQL->bindParam(':otros', $datas["otros"], PDO::PARAM_STR);




        if($sentenciaSQL->execute()){
            
            return "ok";
        }else{
            return "error";
        }

        $sentenciaSQL -> close();
        $sentenciaSQL = null;

    }


    static public function mdlNameEqui($valor){
        //mdlNameClient() recibe como parámetro el valor de la cédula de un cliente a buscar en la tabla "cliente" de la base de datos.
 
         $sentenciaSQL = Conexion::conectar()->prepare("SELECT * FROM equipo WHERE idReparacion = :idReparacion");
 
         $sentenciaSQL -> bindParam(":idReparacion", $valor, PDO::PARAM_STR);
 
         $sentenciaSQL -> execute();
         // retorna la información del cliente encontrado, en caso de existir, o retorna NULL en caso contrario.
         return $sentenciaSQL -> fetch();
     }




}