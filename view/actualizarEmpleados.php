<?php
include_once '../controller/empleadosController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $empleadosController = new empleadosController();
    $empleadosController->updateEmpleado();
}