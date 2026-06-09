<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2 - Arrays en PHP</title>
</head>

<body>
    <h1>ARRAYS EN PHP</h1>
    <p>En PHP, un <strong>array</strong> es un tipo de dato que permite almacenar múltiples valores en una sola variable. 
       Los arrays pueden ser <strong>numéricos</strong> o <strong>asociativos</strong>.</p>

    <h3>1. Definición de arrays</h3>
    <?php
    // Array asociativo
    $array1 = array("foo" => "bar", "bar" => "foo");

    // Array asociativo moderno (PHP 5.4+)
    $array2 = ["foo" => "bar", "bar" => "foo"];

    echo "Array1: ";
    print_r($array1);
    echo "<br>Array2: ";
    print_r($array2);
    echo "<br>";
    ?>

    <h3>2. Arrays multidimensionales</h3>
    <?php
    $ciclos = array(
        "DAW" => array("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web"),
        "DAM" => array("PR" => "Programación", "BD" => "Bases de datos", "SGE" => "Sistemas de gestión")
    );

    $modulos1[0] = "Programación";
    $modulos1[1] = "Bases de datos";
    $modulos1[2] = "Desarrollo web";

    echo "<h4>Array numérico:</h4>";
    for ($i = 0; $i < count($modulos1); $i++) {
        echo "Módulo $i: " . $modulos1[$i] . "<br>";
    }

    echo "<h4>Array asociativo:</h4>";
    foreach ($ciclos as $clave => $valor) {
        echo "Clave $clave => ";
        print_r($valor);
        echo "<br>";
    }
    ?>

    <h3>3. Recorrer arrays con foreach</h3>
    <?php
    $ciudades = ["Sevilla", "Granada", "Córdoba", "Málaga", "Cádiz"];

    echo "<h4>Elementos del array:</h4>";
    foreach ($ciudades as $ciudad) {
        echo $ciudad . "<br>";
    }

    echo "<h4>Clave y valor:</h4>";
    foreach ($ciudades as $clave => $valor) {
        echo "Clave $clave => $valor<br>";
    }
    ?>

    <h3>4. Funciones para recorrer arrays</h3>
    <?php
    reset($ciudades); // Primer elemento
    echo "Primer elemento: " . current($ciudades) . "<br>";
    next($ciudades); // Siguiente elemento
    echo "Siguiente elemento: " . current($ciudades) . "<br>";
    end($ciudades); // Último elemento
    echo "Último elemento: " . current($ciudades) . "<br>";
    ?>

    <h3>5. Funciones útiles con arrays</h3>
    <ul>
        <li><strong>is_array($array):</strong> Comprueba si es un array.</li>
        <li><strong>count($array):</strong> Devuelve el número de elementos.</li>
        <li><strong>in_array($valor, $array):</strong> Comprueba si un valor existe.</li>
        <li><strong>array_search($valor, $array):</strong> Devuelve la clave de un valor.</li>
        <li><strong>array_key_exists($clave, $array):</strong> Comprueba si existe una clave.</li>
        <li><strong>unset($array[$clave]):</strong> Elimina un elemento del array.</li>
        <li><strong>array_values($array):</strong> Reindexa un array numérico.</li>
    </ul>

    <h3>6. Ejemplo práctico: Funciones y arrays</h3>
    <?php
    $modulos = ["PHP", "HTML", "CSS"];
    $modulos[] = "JavaScript"; // Añadir elemento
    $modulos[1] = "HTML5";     // Modificar elemento
    unset($modulos[2]);        // Eliminar elemento
    $modulos = array_values($modulos); // Reindexar

    echo "Array modificado: ";
    print_r($modulos);
    ?>
</body>

</html>
