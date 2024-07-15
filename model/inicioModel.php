<?php
class Admin {
    private $conn;
    private $table_name = "admin";
    public $nombre;
    public $apellidos;
    public $username;
    public $pass;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nombre, apellidos, usuario, password) VALUES (:nombre, :apellidos, :username, :pass)";
        $stmt = $this->conn->prepare($query);

        // Limpieza de datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellidos = htmlspecialchars(strip_tags($this->apellidos));
        $this->username = htmlspecialchars(strip_tags($this->username));
        //$this->pass = htmlspecialchars(strip_tags($this->pass));
        $this->pass = password_hash(htmlspecialchars(strip_tags($this->pass)), PASSWORD_BCRYPT);

        // Bind de parámetros
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellidos', $this->apellidos);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':pass', $this->pass);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

