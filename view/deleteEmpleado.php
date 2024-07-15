<?php 
// deleteCategoria.php
include_once '../controller/empleadosController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $empleados = new empleadosController();
    
    if ($empleados->deleteEmpleado($id)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
