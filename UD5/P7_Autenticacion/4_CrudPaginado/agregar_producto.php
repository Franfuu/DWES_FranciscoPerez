<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $precio = $_POST['precio'] ?? '';
    $stock = $_POST['stock'] ?? '';

    if ($nombre === '' || $precio === '' || $stock === '') {
        $mensaje = "Nombre, precio y stock son obligatorios.";
    } else {
        $stmt = $db->prepare(
            "INSERT INTO productos (nombre, descripcion, precio, stock)
             VALUES (:nombre, :descripcion, :precio, :stock)"
        );
        $stmt->bindValue(':nombre', $nombre, SQLITE3_TEXT);
        $stmt->bindValue(':descripcion', $descripcion, SQLITE3_TEXT);
        $stmt->bindValue(':precio', (float)$precio, SQLITE3_FLOAT);
        $stmt->bindValue(':stock', (int)$stock, SQLITE3_INTEGER);

        if ($stmt->execute()) {
            header("Location: productos.php");
            exit();
        } else {
            $mensaje = "Error al insertar el producto.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="contenedor">
    <h2>Agregar producto</h2>
    <a href="productos.php" class="boton">Volver a productos</a>

    <?php if ($mensaje !== ''): ?>
        <p style="color:red;"><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"></textarea><br>

        <label for="precio">Precio (€):</label>
        <input type="number" name="precio" id="precio" step="0.01" required><br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" required><br>

        <input type="submit" value="Agregar">
    </form>
</div>
</body>
</html>