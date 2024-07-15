<?php
include_once "../config/db_config.php";
include_once "../model/CategoriaModel.php";
include_once "../model/conectDB.php";
include_once "../controller/categoriaController.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoriaController = new CategoriaController();
    $categoriaController->insertCategoria();
}
