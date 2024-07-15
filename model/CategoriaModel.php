<?php
class CategoriaModel{
    public $conn;
    private $table_name = "categoria";
    public $nombreDeCategoria;
    public $id;

    public function __construct($db){
        $this->conn = $db;
    }
    public function insertCategoria(){
        $query = "INSERT INTO " . $this->table_name . "(nombre) VALUES (:nombre)";
        $stmt = $this->conn->prepare($query);

        $this->nombreDeCategoria = htmlspecialchars(strip_tags($this->nombreDeCategoria));
        $stmt->bindParam(':nombre', $this->nombreDeCategoria);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function deleteCategoria($id) {
        $query = "DELETE FROM categoria WHERE id_categoria = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCategoria($id, $nombreDeCategoria) {
        $query = "UPDATE " . $this->table_name . " SET nombre = :nombre WHERE id_categoria = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $nombreDeCategoria);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

}