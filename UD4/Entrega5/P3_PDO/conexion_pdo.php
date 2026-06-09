<?php
/* conexión centralizada con PDO (MySQL/MariaDB) */
function pdo(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) return $pdo;


    $host = 'localhost';
    $db   = 'dwes';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';


    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opts = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // excepciones
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // arrays asociativos
        PDO::ATTR_EMULATE_PREPARES   => false,                  // prepares nativos
    ];
    $pdo = new PDO($dsn, $user, $pass, $opts);
    return $pdo;
}
?>