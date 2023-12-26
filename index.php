<?php
session_start();
?>

<?php

    require_once "controller/plantillaController.php";

    /** CONTROLADORES */
    require_once "controller/userController.php";
    require_once "controller/sucursalControlador.php";
    require_once "controller/bitacoraController.php";
    require_once "controller/bitacoraUpdate.php";
    require_once "controller/clientecontrolador.php";
    require_once "controller/equipoController.php";


    /** MODELOS */
    require_once "model/userModel.php";
    require_once "model/sucursalModelo.php";
    require_once "model/bitacoraModelo.php";
    require_once "model/clienteModelo.php";
    require_once "model/equipoModelo.php";

    

    $plantilla = new ControllerPlantilla();
    $plantilla -> ctrPlantilla();
?>