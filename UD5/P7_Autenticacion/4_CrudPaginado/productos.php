<?php
session_start();
require_once 'config.php';

// Comprobar login
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Parámetros de paginación
$itemsPorPagina = 5;
$paginaActual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
if ($paginaActual < 1) {
    $paginaActual = 1;
}
$offset = ($paginaActual - 1) * $itemsPorPagina;

// Contar total de productos
$resultadoTotal = $db->query("SELECT COUNT(*) AS total FROM productos");
$filaTotal = $resultadoTotal->fetchArray(SQLITE3_ASSOC);
$totalProductos = (int)$filaTotal['total'];
$totalPaginas = max(1, ceil($totalProductos / $itemsPorPagina));

// Obtener productos de la página actual
$stmt = $db->prepare("SELECT * FROM productos ORDER BY id LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $itemsPorPagina, SQLITE3_INTEGER);
$stmt->bindValue(':offset', $offset, SQLITE3_INTEGER);
$resultado = $stmt->execute();

$productos = [];
while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
    $productos[] = $fila;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos – CRUD Paginado</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="contenedor">
    <h1>Productos</h1>
    <p>Usuario: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></p>

    <a href="agregar_producto.php" class="boton">Agregar producto</a>
    <a href="logout.php" class="boton-rojo">Cerrar sesión</a>

    <?php if (count($productos) === 0): ?>
        <p>No hay productos.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio (€)</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($productos as $prod): ?>
                <tr>
                    <td><?php echo $prod['id']; ?></td>
                    <td><?php echo htmlspecialchars($prod['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($prod['descripcion']); ?></td>
                    <td><?php echo number_format($prod['precio'], 2, ',', '.'); ?></td>
                    <td><?php echo $prod['stock']; ?></td>
                    <td>
                        <a class="boton" href="editar_producto.php?id=<?php echo $prod['id']; ?>">Editar</a>
                        <a class="boton-rojo" 
                           href="eliminar_producto.php?id=<?php echo $prod['id']; ?>"
                           onclick="return confirm('¿Seguro que quieres eliminar este producto?');">
                           Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="paginacion">
            <p>Páginas:</p>
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <?php if ($i == $paginaActual): ?>
                    <a href="productos.php?pagina=<?php echo $i; ?>" class="actual"><?php echo $i; ?></a>
                <?php else: ?>
                    <a href="productos.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>