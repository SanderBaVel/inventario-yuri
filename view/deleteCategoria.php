<?php 
// deleteCategoria.php
include_once '../controller/categoriaController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $empleados = new categoriaController();
    
    if ($empleados->deleteCategoria($id)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
