<?php
function conectar_bd() {
    $db_file = 'database.sqlite';
    return new PDO("sqlite:" . $db_file);
}

function verificar_usuario($usuario, $password) {
    $db = conectar_bd();
    $stmt = $db->prepare("SELECT password FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);

    return $fila && password_verify($password, $fila['password']);
}
?>