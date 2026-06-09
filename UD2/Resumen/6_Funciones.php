<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>FUNCIONES EN PHP</h1>
    <h3>Funcion simple</h3>
    <?php
    function saludar()
    {
        return "¡Hola, mundo!";
    }

    echo saludar() . "<br>";
    ?>

    <h3>-------------</h3>

    <h3>Funcion condicional</h3>
    <?php
    $usuario = "Francisco";

    if ($usuario == "Francisco") {
        function bienvenida()
        {
            return "Bienvenido Francisco!";
        }
    }
    echo bienvenida() . "<br>";
    ?>

    <h3>-------------</h3>

    <h3>Funcion con argumentos</h3>
    <?php
    function sumar($a, $b)
    {
        return $a + $b;
    }

    echo "2 + 3 = " . sumar(2, 3) . "<br>";
    ?>

    <h3>-------------</h3>

    <h3>Funcion con argumentos por defecto</h3>
    <?php
    function potencia($base, $exponente = 2)
    {
        return $base ** $exponente;
    }

    echo "5^2 = " . potencia(5) . "<br>";
    echo "5^3 = " . potencia(5, 3) . "<br>";
    ?>

    <h3>-------------</h3>

    <h3>Funcion con argumentos por referencia</h3>
    <?php
    function aumentar(&$numero)
    {
        $numero += 10;
    }

    $valor = 5;
    aumentar($valor);
    echo "Valor después de aumentar: $valor<br>";
    ?>

    <h3>-------------</h3>
    <h3>Funcion con argumentos variables</h3>
    <?php
    function sumarMuchos(...$numeros)
    {
        $total = 0;
        foreach ($numeros as $n) {
            $total += $n;
        }
        return $total;
    }
    echo "Suma: " . sumarMuchos(1, 2, 3, 4, 5) . "<br>";
    ?>
    <h3>-------------</h3>
    <h3>Includes y Requires</h3>
    <p>
        <strong>include:</strong> Evalúa el contenido del fichero indicado y lo incluye como parte del fichero actual,
        en el mismo punto donde se realiza la llamada. La ubicación del fichero puede especificarse con una ruta
        absoluta, pero lo más habitual es usar una ruta relativa. En este caso, se toma como base la ruta definida en la
        directiva <code>include_path</code> del fichero <code>php.ini</code>. Si no se encuentra allí, se buscará
        también en el directorio del script actual y en el directorio de ejecución.
    </p>
    <p>
        <strong>include_once:</strong> Funciona igual que <code>include</code>, pero solo incluye los ficheros que aún
        no se han incluido. Esto evita errores por definir funciones o variables repetidas si accidentalmente se incluye
        varias veces el mismo fichero.
    </p>
    <p>
        <strong>require:</strong> Similar a <code>include</code>, pero si el fichero no se encuentra, detiene la
        ejecución del script con un error fatal. Mientras que <code>include</code> solo lanza un aviso y continúa.
    </p>
    <p>
        <strong>require_once:</strong> Es la combinación de <code>require</code> e <code>include_once</code>. Asegura
        que el fichero se incluya solo una vez y detiene el script si no puede hacerlo.
    </p>

</body>

</html>