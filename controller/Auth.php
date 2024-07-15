<?php
// AuthController.php

include_once '../model/conectDB.php';
include_once '../model/AuthModel.php';

class Auth
{
    private $db;
    private $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new UserModel($this->db);
    }

    public function initSession()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->user->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['usuario'];
                header("Location: ../view/inicio.php");
                exit();
            } else {
                $_SESSION['error'] = "Nombre de usuario o contraseña incorrectos.";
                header("Location: /yuri");
                exit();
            }
        } else {
            header("Location: /yuri");
            exit();
        }
    }
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /yuri");
        exit();
    }

}
$iniciar = new Auth();
$iniciar->initSession();