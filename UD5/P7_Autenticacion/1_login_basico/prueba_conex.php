<?php
// Definir la ruta de la base de datos SQLite
$db_path = 'database.sqlite';

try {
    // Conexión a la base de datos SQLite
    $pdo = new PDO('sqlite:' . $db_path);

    // Configuración
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar filas de la tabla
    $query = "SELECT * FROM ud5__usuarios_pass";
    $stmt = $pdo->query($query);

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($rows)) {
        echo "<h2>Usuarios Registrados</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>Usuario</th><th>Contraseña</th></tr>";

        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
            echo "<td>" . htmlspecialchars($row['user']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pass']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No hay usuarios registrados.</p>";
    }

} catch (PDOException $e) {
    echo "Error al conectarse a la base de datos: " . $e->getMessage();
}
?>