<?php
class Database {
    private $host = 'localhost';
    private $dbName = 'dwes';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        try {

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>