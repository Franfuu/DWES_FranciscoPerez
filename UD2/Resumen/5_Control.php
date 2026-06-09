<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Estructuras de Control</h1>
    <p>Son las tipicas de casi todos los lenguajes </p>
    <h3>------------</h3>

    <h2>If / ElseIf / Else</h2>
    <?php
    $a = 10;
    $b = 5;

    if ($a > $b) {
        echo "a es más grande que b";
    } elseif ($a < $b) {
        echo "a es más pequeño que b";
    } else {
        echo "a y b son iguales";
    }
    ?>
    <h3>------------</h3>

    <h2>Switch</h2>
    <?php
    $color = "rojo";

    switch ($color) {
        case "rojo":
            echo "<br>Color rojo seleccionado";
            break;
        case "azul":
            echo "<br>Color azul seleccionado";
            break;
        default:
            echo "<br>Color no reconocido";
    }
    ?>
    <h3>------------</h3>

    <h2>While</h2>
    <?php
    $i = 0;
    while ($i < 3) {
        echo "<br>i = $i";
        $i++;
    }
    ?>
    <h3>------------</h3>

    <h2>For</h2>
    <?php
    for ($k = 0; $k < 3; $k++) {
        echo "<br>k = $k";
    }
    ?>
    <h3>------------</h3>

    <h2>Foreach</h2>
    <?php
    $colores = ["rojo", "verde", "azul"];
    foreach ($colores as $color) {
        echo "<br>Color: $color";
    }
    ?>

</body>

</html>