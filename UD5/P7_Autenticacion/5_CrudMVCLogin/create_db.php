<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

// Crear carpeta data si no existe (esto es importante hacerlo ANTES de abrir la BD)
$dataDir = __DIR__ . '/data';
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0777, true);
}

$pdo = getPdo();

// Crear tabla de usuarios
$pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL UNIQUE,
        password_hash TEXT NOT NULL
    )
");

// Crear tabla de productos
$pdo->exec("
    CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        price REAL NOT NULL,
        created_at TEXT NOT NULL
    )
");

// Crear usuario por defecto si no existe
$stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE username = :u');
$stmt->execute([':u' => 'admin']);
$exists = (int)$stmt->fetchColumn();

if ($exists === 0) {
    $passwordHash = password_hash('admin123', PASSWORD_DEFAULT);
    $insert = $pdo->prepare('INSERT INTO users (username, password_hash) VALUES (:u, :p)');
    $insert->execute([
        ':u' => 'admin',
        ':p' => $passwordHash,
    ]);
    echo "Base de datos creada y usuario 'admin' con contraseña 'admin123' generado." . PHP_EOL;
} else {
    echo "Base de datos ya existente. Usuario 'admin' ya creado." . PHP_EOL;
}