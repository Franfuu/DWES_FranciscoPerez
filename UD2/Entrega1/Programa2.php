<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejemplo PHP con variables</title>
</head>

<body>
    <h1>Ejemplo de variable en PHP</h1>

    <?php
    // Primer bloque PHP: creamos la variable
    $nombre = "Francisco Pérez";
    ?>

    <p>El valor de la variable es:</p>

    <?php echo "<strong>" . $nombre . "</strong>"; ?>

    <?php
    $ciclo = "DAW";
    $modulo = "DWES";
    print "<p>";
    printf("Estoy estudiando %s en el ciclo de %s", $modulo, $ciclo);
    print "<p>";
    ?>

</body>

</html>