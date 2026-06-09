<?php
/* ===== insertar_multiples_tx.php =====
   INSERT atómico de 2 filas en dwes.ud4_empresa (o ninguna si falla).
*/
require_once __DIR__ . '/conexion_mysqli.php';
$cn = db();
//echo "<br>Conexión establecida.<br>";


// bloque try-catch-finally para manejar la transacción
try {
    // Inicio de la transacción
    mysqli_begin_transaction($cn);


    // Preparar la sentencia INSERT con marcadores de posición: ?, ?, ?
    $stmt = mysqli_prepare($cn,
        "INSERT INTO ud4_empresa (nombre, cargo, salario) VALUES (?, ?, ?)"
    );


    // 1ª fila
    $nombre = "Alberto"; $cargo = "Interfaces"; $salario = 20000.00;


    // Vincular los parámetros y ejecutar la sentencia
    mysqli_stmt_bind_param($stmt, "ssd", $nombre, $cargo, $salario);


    // Ejecutar el INSERT
    mysqli_stmt_execute($stmt);


    // 2ª fila
    $nombre = "Maria"; $cargo = "Desarrollo"; $salario = 30000.00;
    mysqli_stmt_bind_param($stmt, "ssd", $nombre, $cargo, $salario);
    mysqli_stmt_execute($stmt);


    mysqli_stmt_close($stmt);
    mysqli_commit($cn);
    echo "Insertadas 2 filas en dwes.ud4_empresa.";
} catch (Throwable $e) {
    mysqli_rollback($cn);
    echo "Insert cancelado: " . $e->getMessage();
} finally {
    mysqli_close($cn);
}
