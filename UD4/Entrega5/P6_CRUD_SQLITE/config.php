<?php
declare(strict_types=1);

// Ruta al fichero SQLite
$dbDir  = __DIR__ . '/data';
$dbFile = $dbDir . '/jugadores.sqlite';

if (!is_dir($dbDir)) {
    mkdir($dbDir, 0777, true);
}

$pdo = new PDO('sqlite:' . $dbFile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Crear tabla si no existe
$pdo->exec("
CREATE TABLE IF NOT EXISTS jugadores (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  usuario   TEXT NOT NULL UNIQUE,
  nombre    TEXT NOT NULL,
  apellidos TEXT NOT NULL,
  created_at TEXT DEFAULT (datetime('now'))
);
");

// Seed de 5 jugadores por defecto si la tabla está vacía
$count = (int)$pdo->query("SELECT COUNT(*) FROM jugadores")->fetchColumn();
if ($count === 0) {
    $pdo->beginTransaction();
    $stmt = $pdo->prepare("
        INSERT INTO jugadores (usuario, nombre, apellidos)
        VALUES (:usuario, :nombre, :apellidos)
    ");

    $seed = [
        ['u' => 'jgarcia',  'n' => 'Juan',    'a' => 'García López'],
        ['u' => 'mlopez',   'n' => 'María',   'a' => 'López Díaz'],
        ['u' => 'aperez',   'n' => 'Alberto', 'a' => 'Pérez Martín'],
        ['u' => 'cserrano', 'n' => 'Carmen',  'a' => 'Serrano Ruiz'],
        ['u' => 'rnavarro', 'n' => 'Raúl',    'a' => 'Navarro Gil'],
    ];

    foreach ($seed as $s) {
        $stmt->execute([
            ':usuario'   => $s['u'],
            ':nombre'    => $s['n'],
            ':apellidos' => $s['a'],
        ]);
    }
    $pdo->commit();
}