<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Sistema de Login - SQLite</title>
</head>
<body>
<?php
// Ruta a la base de datos SQLite
$db_path = 'database.sqlite';

try {
    // Establecemos conexión con SQLite usando PDO
    $base = new PDO('sqlite:' . $db_path);
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Validamos las entradas
    if (!isset($_POST['login']) || !isset($_POST['password'])) {
        die("Error: Debes proporcionar usuario y contraseña.");
    }

    // Recogemos y preparamos los datos
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Definimos la consulta SQL con marcadores importantes los 2 puntos
    $sql = "SELECT * FROM ud5__usuarios_pass WHERE user = :login AND pass = :password";
    $resultado = $base->prepare($sql);

    // Asociamos los valores
    $resultado->bindValue(":login", $login);
    $resultado->bindValue(":password", $password);

    // Ejecutamos la consulta
    $resultado->execute();

    // Obtenemos registro
    $registro = $resultado->fetch(PDO::FETCH_ASSOC);

    if ($registro) {
        // Usuario existe
        echo "<h2>¡Adelante!</h2>";
        session_start();  
        $_SESSION["usuario"] = $login;
        header("Location: usuarios_registrados.php");
        exit();
    } else {
        // Usuario NO existe
        echo "Usuario o contraseña incorrectos. Redirigiendo...";
        header("refresh:2; url=login.php");
        exit();
    }

} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
</body>
</html>