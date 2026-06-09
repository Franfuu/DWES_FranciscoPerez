<?php
/* ===== select_for_update_tx.php =====
   Lectura con bloqueo de fila (SELECT ... FOR UPDATE) + actualización consistente.
*/
require_once __DIR__ . '/conexion_mysqli.php';
$cn = db();


//selecciona el id para encontrar y actualizar
$id = 2;


try {
    mysqli_begin_transaction($cn);


    // 1) Leer con bloqueo
    $stmt = mysqli_prepare($cn,
      "SELECT salario FROM ud4_empresa WHERE id = ? FOR UPDATE"
    );
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res);
    if (!$row) {
        throw new RuntimeException("Empleado no existe (id=$id).");
    }


    echo "Hemos leído el salario con FOR UPDATE.<br>";
    echo "Salario actual: " . $row['salario'] . "<br>";
    // Obtener salario actual
    $salarioActual = (float)$row['salario'];
    mysqli_free_result($res);
    mysqli_stmt_close($stmt);


    // 2) Calcular nuevo salario (ej. +100€)
    $nuevo = $salarioActual ;


    // 3) Actualizar
    $stmt = mysqli_prepare($cn,
      "UPDATE ud4_empresa SET salario = ? WHERE id = ?"
    );
    mysqli_stmt_bind_param($stmt, "di", $nuevo, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    mysqli_commit($cn);
    echo "Salario actualizado con FOR UPDATE en dwes.ud4_empresa.";
} catch (Throwable $e) {
    mysqli_rollback($cn);
    echo "Error transaccional: " . $e->getMessage();
} finally {
    mysqli_close($cn);
}
