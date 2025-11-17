<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
    $stmt = $db->prepare("DELETE FROM productos WHERE id = :id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();
}

header("Location: productos.php");
exit();