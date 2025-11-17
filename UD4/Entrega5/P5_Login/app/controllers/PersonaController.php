<?php
require_once __DIR__ . '/../models/Persona.php';

class PersonaController {
    public function gestionLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';

            $personaModel = new Persona();

            $persona = $personaModel->login($usuario, $contrasena);

            if ($persona) {
                // Redirige al usuario si las credenciales son correctas
                header('Location: welcome.php');
                echo "Autenticación exitosa";
                exit();
            } else {
                // En caso de error, muestra un mensaje
                $error = "Credenciales incorrectas.";
                require_once __DIR__ . '/../views/login.php';
            }
        } else {
            require_once __DIR__ . '/../views/login.php';
        }
    }
}
?>