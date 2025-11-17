<?php
require_once __DIR__ . '/../../config/database.php';

class Persona {
    private $conn;

    /**
     * The function creates a new Database object and establishes a connection to the database.
     */
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    /**
     * The login function queries a database table to retrieve a record based on the provided name and
     * phone number.
     * 
     * @param usuario The `usuario` parameter in the `login`
     * @param contrasena The parameter `contrasena` is a string that represents the password of the user trying to log in.
     * @return The `login` function is returning a single record from the `persona` 
     */
    public function login($usuario, $contrasena) {
        try {
            $query = "SELECT * FROM ud4_persona WHERE usuario = :usuario AND contrasena = :contrasena";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':usuario',   );
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un registro si lo encuentra
        } catch (PDOException $e) {
            die("Error al realizar la consulta: " . $e->getMessage());
        }
    }
}
?>