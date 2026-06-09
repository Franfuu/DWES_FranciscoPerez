<?php
// Nombre del fichero SQLite
define("DB_NAME", "database.sqlite");

try {
    // Conexión con SQLite3 (estilo orientado a objetos)
    $db = new SQLite3(DB_NAME);

    // Crear tabla de usuarios si no existe
    $db->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        usuario TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL
    )");

    // Crear tabla de productos si no existe
    $db->exec("CREATE TABLE IF NOT EXISTS productos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL,
        descripcion TEXT,
        precio REAL NOT NULL,
        stock INTEGER NOT NULL
    )");

    // Comprobar si existe usuario admin
    $resultado = $db->query("SELECT COUNT(*) AS total FROM usuarios WHERE usuario = 'admin'");
    $fila = $resultado->fetchArray(SQLITE3_ASSOC);

    if ((int)$fila['total'] === 0) {
        // Crear usuario admin con hash
        $hash = password_hash('admin', PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)");
        $stmt->bindValue(':usuario', 'admin', SQLITE3_TEXT);
        $stmt->bindValue(':password', $hash, SQLITE3_TEXT);
        $stmt->execute();
    }

    // Comprobar si hay productos
    $resultadoProd = $db->query("SELECT COUNT(*) AS total FROM productos");
    $filaProd = $resultadoProd->fetchArray(SQLITE3_ASSOC);

    if ((int)$filaProd['total'] === 0) {
        // Insertar productos de prueba
        $productosIniciales = [
            ['Teclado mecánico', 'Teclado mecánico retroiluminado', 59.90, 15],
            ['Ratón inalámbrico', 'Ratón óptico 1600dpi', 19.99, 30],
            ['Monitor 24"', 'Monitor Full HD 24 pulgadas', 129.00, 10],
            ['Portátil 15"', 'Portátil i5, 8GB RAM, 512GB SSD', 699.00, 8],
            ['Auriculares', 'Auriculares gaming con micrófono', 39.95, 20],
            ['Disco SSD 1TB', 'SSD 1TB NVMe', 89.99, 12],
            ['Hub USB', 'Hub USB 4 puertos', 14.50, 25],
            ['Impresora', 'Impresora WiFi multifunción', 99.00, 5],
            ['Altavoces', 'Altavoces 2.1 para PC', 49.90, 9],
            ['Micrófono USB', 'Micrófono condensador para streaming', 59.00, 7],
        ];

        $stmt = $db->prepare(
            "INSERT INTO productos (nombre, descripcion, precio, stock) 
             VALUES (:nombre, :descripcion, :precio, :stock)"
        );

        foreach ($productosIniciales as $producto) {
            $stmt->bindValue(':nombre', $producto[0], SQLITE3_TEXT);
            $stmt->bindValue(':descripcion', $producto[1], SQLITE3_TEXT);
            $stmt->bindValue(':precio', $producto[2], SQLITE3_FLOAT);
            $stmt->bindValue(':stock', $producto[3], SQLITE3_INTEGER);
            $stmt->execute();
        }
    }

} catch (Exception $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
    exit();
}
?>