<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de Variables Predefinidas</title>
</head>
<body>

<h2>Variables Predefinidas (Superglobales)</h2>
<?php
echo "<p>Servidor: " . $_SERVER['SERVER_NAME'] . "</p>";
echo "<p>Archivo actual: " . $_SERVER['PHP_SELF'] . "</p>";
echo "<p>Dirección IP del cliente: " . ($_SERVER['REMOTE_ADDR'] ?? "Desconocida") . "</p>";
echo "<p>Parámetro GET 'ejemplo': " . ($_GET['ejemplo'] ?? "No enviado") . "</p>";
?>

<h2>Constantes Predefinidas</h2>
<?php
echo "<p>Versión de PHP: " . PHP_VERSION . "</p>";
echo "<p>Sistema operativo del servidor: " . PHP_OS . "</p>";
echo "<p>Directorio de instalación de PHP: " . PHP_BINDIR . "</p>";
echo "<p>Tamaño máximo de enteros (PHP_INT_MAX): " . PHP_INT_MAX . "</p>";
echo "<p>Separador de directorios (DIRECTORY_SEPARATOR): " . DIRECTORY_SEPARATOR . "</p>";
?>

</body>
</html>