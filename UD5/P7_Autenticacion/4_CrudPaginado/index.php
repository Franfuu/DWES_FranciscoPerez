<?php
session_start();
require_once 'config.php'; // Crea BD, tablas y usuario admin si no existen

// Si ya está logueado, lo mandamos a productos
if (isset($_SESSION['usuario'])) {
    header("Location: productos.php");
    exit();
}

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($usuario === '' || $password === '') {
        $mensaje = "Debes introducir usuario y contraseña.";
    } else {
        // Buscar usuario
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $stmt->bindValue(':usuario', $usuario, SQLITE3_TEXT);
        $resultado = $stmt->execute();
        $fila = $resultado->fetchArray(SQLITE3_ASSOC);

        if ($fila && password_verify($password, $fila['password'])) {
            // Login correcto
            $_SESSION['usuario'] = $fila['usuario'];
            header("Location: productos.php");
            exit();
        } else {
            $mensaje = "Usuario o contraseña incorrectos.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login CRUD Paginado</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <h1>Login – CRUD Paginado</h1>

        <?php if ($mensaje !== ''): ?>
            <p style="color:red;"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required><br>

            <input type="submit" value="Entrar">
        </form>

        <p><strong>Usuario de prueba:</strong> admin / admin</p>
    </div>
</body>
</html>