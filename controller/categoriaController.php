<?php 
include_once '../model/conectDB.php';
include_once '../model/CategoriaModel.php';

class CategoriaController{
private $db;
private $usr;
private $id;

public function __construct(){
    $database = new Database;
    $this->db = $database->getConnection();
    $this->usr = new CategoriaModel($this->db);
}
public function insertCategoria(){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $this->usr->nombreDeCategoria =$_POST['NomCategoria'];

        if ($this->usr->insertCategoria()) {
            echo '
            <div class="alert alert-primary" role="alert">
                guardado
            </div>';
        } else {
            echo "Error al crear el usuario.";
        }
    }
}
public function showCategoria(){}
public function deleteCategoria($id) {
    return $this->usr->deleteCategoria($id);
}
public function updateCategoria() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nombreDeCategoria = $_POST['nombreDeCategoria'];

        $result = $this->usr->updateCategoria($id, $nombreDeCategoria);

        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
}
}
