<?php
ensureSession();
$user = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Productos con Login (PHP + SQLite)</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
<nav class="nav">
    <div class="nav-left">
        <span class="logo">Mini MVC</span>
    </div>
    <div class="nav-right">
        <?php if ($user): ?>
            <span class="nav-user">Hola, <?= htmlspecialchars($user['username']) ?></span>
            <a href="index.php?c=product&a=index">Productos</a>
            <a href="index.php?c=auth&a=logout">Cerrar sesión</a>
        <?php else: ?>
            <a href="index.php?c=auth&a=login">Login</a>
        <?php endif; ?>
    </div>
</nav>
<main class="container"></main>