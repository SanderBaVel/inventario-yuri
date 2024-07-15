<?php
// AuthModel.php
class UserModel
{
    private $conn;
    private $table_name = "admin";
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE usuario = :username LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
}
