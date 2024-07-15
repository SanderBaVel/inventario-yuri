<?php
include_once '../model/conectDB.php';
include_once '../model/CategoriaModel.php';
include_once '../model/EmpleadoModel.php';
class EmpleadosController{
    private $db;
    private $usr;
    public function __construct(){
        $database = new Database;
        $this->db = $database->getConnection();
        $this->usr = new EmpleadoModel($this->db);
    }
    public function insertEmpleado(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $this->usr->nombre =$_POST['nombre'];
            $this->usr->apellido =$_POST['apellidos'];
            $this->usr->telefono =$_POST['telefono'];
            $this->usr->direccion =$_POST['direccion'];
            $this->usr->salario =$_POST['salario'];
            $this->usr->categoria =$_POST['categoria'];
    
            if ($this->usr->insertEmpleado()) {
                echo '
                <div class="alert alert-primary" role="alert">
                    guardado
                </div>';
            } else {
                echo "Error al reguistrar al colaborador.";
            }
        }
    }
    public function getCategorias()
    {
       return $stmt = $this->usr->getCategoria();
        /*$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        return json_encode($categorias);*/
    }
    public function getEmpleados(){
        return $stmt = $this->usr->getEmpleados();
    }
    public function updateEmpleado(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $data = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'direccion' => $_POST['direccion'],
                'telefono' => $_POST['telefono'],
                'salario' => $_POST['salario'],
                'id_categoria' => $_POST['categoria']
            ];
    
            if ($this->usr->updateEmpleados($id, $data)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Error al actualizar el empleado']);
            }
        } else {
            // Devuelve un error si no se ha enviado una solicitud POST
            echo json_encode(['error' => 'Solicitud no válida']);
        }
    }
    public function deleteEmpleado($id){
        return $this->usr->deleteEmpleado($id);
    }
}


