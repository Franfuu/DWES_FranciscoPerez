<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo con Usuario</title>
</head>
<body>
    <?php
    $usuario = "Francisco";
    $edad = 20;

    // Mostramos el usuario
    echo "<h2>Bienvenido, $usuario</h2>";

    if ($edad >= 18) {
        echo "$usuario es mayor de edad.";
    } else {
        echo "$usuario es menor de edad.";
    }
    ?>

    <br><br>

    <?php
    $a = 5;
    $b = 10;

    if ($a > $b) {
        echo "a es más grande que b";
    } else if ($a < $b) {
        echo "b es más grande que a";
    } else {
        echo "a y b son iguales";
    }
    ?>
</body>
</html>
