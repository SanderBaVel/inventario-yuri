<?php
include_once '../controller/CategoriaController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $categoriaController = new CategoriaController();
    $categoriaController->updateCategoria();
}