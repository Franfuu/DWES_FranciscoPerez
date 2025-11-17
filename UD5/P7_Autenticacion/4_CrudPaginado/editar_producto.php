<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    header("Location: productos.php");
    exit();
}

$mensaje = '';

// Obtener datos actuales del producto
$stmt = $db->prepare("SELECT * FROM productos WHERE id = :id");
$stmt->bindValue(':id', $id, SQLITE3_INTEGER);
$resultado = $stmt->execute();
$producto = $resultado->fetchArray(SQLITE3_ASSOC);

if (!$producto) {
    header("Location: productos.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $precio = $_POST['precio'] ?? '';
    $stock = $_POST['stock'] ?? '';

    if ($nombre === '' || $precio === '' || $stock === '') {
        $mensaje = "Nombre, precio y stock son obligatorios.";
    } else {
        $stmtUpdate = $db->prepare(
            "UPDATE productos
             SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock
             WHERE id = :id"
        );
        $stmtUpdate->bindValue(':nombre', $nombre, SQLITE3_TEXT);
        $stmtUpdate->bindValue(':descripcion', $descripcion, SQLITE3_TEXT);
        $stmtUpdate->bindValue(':precio', (float)$precio, SQLITE3_FLOAT);
        $stmtUpdate->bindValue(':stock', (int)$stock, SQLITE3_INTEGER);
        $stmtUpdate->bindValue(':id', $id, SQLITE3_INTEGER);

        if ($stmtUpdate->execute()) {
            header("Location: productos.php");
            exit();
        } else {
            $mensaje = "Error al actualizar el producto.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="contenedor">
    <h2>Editar producto</h2>
    <a href="productos.php" class="boton">Volver a productos</a>

    <?php if ($mensaje !== ''): ?>
        <p style="color:red;"><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"
               value="<?php echo htmlspecialchars($producto['nombre']); ?>" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"><?php
            echo htmlspecialchars($producto['descripcion']);
        ?></textarea><br>

        <label for="precio">Precio (€):</label>
        <input type="number" name="precio" id="precio" step="0.01"
               value="<?php echo htmlspecialchars($producto['precio']); ?>" required><br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock"
               value="<?php echo htmlspecialchars($producto['stock']); ?>" required><br>

        <input type="submit" value="Guardar cambios">
    </form>
</div>
</body>
</html>