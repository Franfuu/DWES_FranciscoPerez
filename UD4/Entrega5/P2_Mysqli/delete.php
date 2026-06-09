<?php
/* ===== borrar_empleado_tx.php =====
   DELETE seguro bajo transacción (valida filas afectadas = 1).
*/
require_once __DIR__ . '/conexion_mysqli.php';
$cn = db();


// Empleado a borrar
$id = 1;


try {
    mysqli_begin_transaction($cn);


    $stmt = mysqli_prepare($cn, "DELETE FROM ud4_empresa WHERE id = ?" );
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);


    if (mysqli_stmt_affected_rows($stmt) !== 1) {
        throw new RuntimeException("No se eliminó exactamente 1 fila (¿ID inexistente?).");
    }


    mysqli_stmt_close($stmt);
    mysqli_commit($cn);
    echo "Empleado eliminado de dwes.ud4_empresa.";
} catch (Throwable $e) {
    mysqli_rollback($cn);
    echo "Delete revertido: " . $e->getMessage();
} finally {
    mysqli_close($cn);
}

?>