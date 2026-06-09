<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejemplo Programa3 con variables</title>
</head>

<body>
 <h1>Variables de empresa numericas y de cadena</h1>
 <?php
    $nombreEmpresa = "Josmar Inda";
    $direccion = "Calle los Alamillos";
    $telefono = "766-899-566";
    $numEmpleados = 10;
    $facturacionAnual = 2.5; // 2.5 millones
    $beneficioNeto = 500000; // 500 mil

    printf("<p>La empresa %s, ubicada en %s, con teléfono %s, cuenta con %d empleados, una facturación anual de %.2f millones y un beneficio neto de %d euros.</p>",
        $nombreEmpresa, $direccion, $telefono, $numEmpleados, $facturacionAnual, $beneficioNeto);
 ?>

</body>

</html>