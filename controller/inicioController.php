<?php
session_start();
include_once '../controller/authMiddleware.php';
checkAuth();
include_once '../model/conectDB.php';
include_once '../model/inicioModel.php';

class InicioController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new Admin($this->db);
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->user->nombre = $_POST['nombre'];
            $this->user->apellidos = $_POST['apellidos'];
            $this->user->username = $_POST['username'];
            $this->user->pass = $_POST['pass'];

            if ($this->user->create()) {
                echo '
                alert("Por favor, rellena todos los campos.");
                ';
            } else {
                echo "Error al crear el usuario.";
            }
        }
    }
}

$controller = new InicioController();
$controller->register();
