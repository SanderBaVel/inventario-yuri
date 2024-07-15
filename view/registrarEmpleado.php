<?php
include_once "../config/db_config.php";
include_once "../model/empleadoModel.php";
include_once "../model/conectDB.php";
include_once "../controller/empleadosController.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empleadosController = new empleadosController;
    $empleadosController->insertEmpleado();
}
