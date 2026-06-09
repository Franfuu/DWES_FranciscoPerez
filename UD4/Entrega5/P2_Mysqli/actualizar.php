<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$cn = mysqli_connect("localhost","root","","dwes");
mysqli_set_charset($cn, "utf8mb4");


$id = 1;                 // empleado objetivo
$nuevo = 2000.00;


try {
    mysqli_begin_transaction($cn);


    $stmt = mysqli_prepare($cn,
      "UPDATE ud4_empresa SET salario = ? WHERE id = ?"
    );
    mysqli_stmt_bind_param($stmt, "di", $nuevo, $id);
    mysqli_stmt_execute($stmt);


    if (mysqli_stmt_affected_rows($stmt) !== 1) {
        throw new RuntimeException("No se actualizó exactamente 1 fila.");
    }


    mysqli_stmt_close($stmt);
    mysqli_commit($cn);
    echo "✅ Salario actualizado.";
} catch (Throwable $e) {
    mysqli_rollback($cn);
    echo "❌ Update revertido: " . $e->getMessage();
} finally {
    mysqli_close($cn);
}
