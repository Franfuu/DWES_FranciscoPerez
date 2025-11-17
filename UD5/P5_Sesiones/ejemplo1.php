<?php
// Iniciar sesión
session_start();

// Almacenar un dato en la sesión (por ejemplo, el nombre del usuario)
$_SESSION['usuario'] = 'Antinio Martinez';
$_SESSION['id_sesion'] = session_id();
echo print_r($_SESSION);

    session_destroy();

    $_SESSION['id_sesion'] = session_id();

    echo"<br>", print_r($_SESSION);
?>