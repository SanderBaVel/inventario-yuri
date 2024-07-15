<?php
require_once '../config/db_config.php';
class Database{
    public $conn;
    public function getConnection(){

        $this->conn = null;
        try {
            $this->conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
        return $this->conn;
    }
    
}

