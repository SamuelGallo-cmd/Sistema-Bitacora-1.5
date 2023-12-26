<?php
header('Content-Type: application/json');
require_once "../controller/bitacoraUpdate.php";
require_once "../model/bitacoraModelo.php";

// Comprobar si se recibe el parámetro "idClient" por POST
if (isset($_POST["idClient"])) {
    $parametro = $_POST["idClient"];

    // Llamar directamente a la función bitacoraConParametro y obtener el resultado como array PHP
    $resultado = ModeloBitacora::bitacoraConParametro($parametro);
    
    // Devolver la respuesta como JSON
    echo json_encode($resultado);
    exit;
} else {
    // Si no se proporciona el parámetro esperado, devuelve un error
    echo json_encode(["error" => "Parámetro 'idClient' no proporcionado"]);
    exit;
}

?>
