<?php
class EmpleadoModel
{
    public $conn;
    private $table_name = "empleados";
    private $table_nameC = "categoria";
    public $nombre;
    public $apellido;
    public $telefono;
    public $direccion;
    public $salario;
    public $categoria;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function insertEmpleado()
    {
        $query = "INSERT INTO " . $this->table_name .
            " (id_categoria, nombre, apellido, telefono, direccion, salario) VALUES 
            (:id_C, :nombre, :apellido, :telefono, :direccion, :salario)";

        $stm = $this->conn->prepare($query);

        // Limpiar los datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido)); // Cambiado de $this->apellidos a $this->apellido
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->direccion = htmlspecialchars(strip_tags($this->direccion));
        $this->categoria = htmlspecialchars(strip_tags($this->categoria));
        $this->salario = htmlspecialchars(strip_tags($this->salario));

        // Vincular parámetros
        $stm->bindParam(':id_C', $this->categoria);
        $stm->bindParam(':nombre', $this->nombre);
        $stm->bindParam(':apellido', $this->apellido); // Cambiado de :apellido a :apellidos
        $stm->bindParam(':telefono', $this->telefono);
        $stm->bindParam(':direccion', $this->direccion);
        $stm->bindParam(':salario', $this->salario);

        // Ejecutar la consulta
        if ($stm->execute()) {
            return true;
        }

        return false;
    }

    public function getCategoria()
    {
        $query = "SELECT * FROM " . $this->table_nameC;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getEmpleados()
    {
        try {
            $query = "SELECT e.*, c.nombre AS nombre_categoria 
                      FROM " . $this->table_name . " e 
                      INNER JOIN " . $this->table_nameC . " c 
                      ON e.id_categoria = c.id_categoria;";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    // Función para actualizar empleados
    public function updateEmpleados($id, $data)
    {
        try {
            $query = "UPDATE " . $this->table_name . " SET ";
            $params = array();

            // Campos permitidos para la actualización
            $fields = ['nombre', 'apellido', 'direccion', 'telefono', 'salario', 'id_categoria'];

            // Recorrer los campos y construir la consulta
            foreach ($fields as $field) {
                if (!empty($data[$field])) {
                    $query .= "$field = :$field, ";
                    $params[":$field"] = $data[$field];
                }
            }

            // Eliminar la última coma y espacio
            $query = rtrim($query, ', ');

            $query .= " WHERE id = :id";
            $params[':id'] = $id;

            $stmt = $this->conn->prepare($query);
            foreach ($params as $key => &$val) {
                $stmt->bindParam($key, $val);
            }
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function deleteEmpleado($id){
        $query = "DELETE FROM " . $this->table_name .  " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}