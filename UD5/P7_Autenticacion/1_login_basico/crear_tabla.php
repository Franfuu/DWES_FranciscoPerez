<?php
// Ruta donde se guardará la base de datos SQLite
$db_path = 'database.sqlite';

try {
    // Conexión a la base de datos SQLite (se crea automáticamente si no existe)
    $pdo = new PDO('sqlite:' . $db_path);

    // Configuración para lanzar excepciones en caso de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL para crear la tabla ud5__usuarios_pass
    $createTableSQL = "
    CREATE TABLE IF NOT EXISTS ud5__usuarios_pass (
        ID INTEGER PRIMARY KEY AUTOINCREMENT,
        user VARCHAR(20) NOT NULL,
        pass TEXT NOT NULL
    )";

    // Ejecutar la creación de la tabla
    $pdo->exec($createTableSQL);

    echo "Tabla 'ud5__usuarios_pass' creada con éxito.<br>";

    // Insertar un usuario en la tabla
    $insertSQL = "
    INSERT INTO ud5__usuarios_pass (user, pass) 
    VALUES (:user, :pass)";

    // Preparar y ejecutar la inserción de datos
    $stmt = $pdo->prepare($insertSQL);
    $stmt->execute([
        ':user' => 'admin',
        ':pass' => 'admin'
    ]);

    echo "Usuario 'admin' insertado con éxito.";
} catch (PDOException $e) {
    // Mostrar el error si ocurre
    echo "Error en la creación de la tabla o inserción de datos: " . $e->getMessage();
}
?>