<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo para Imprimir archivo 3</title>
</head>

<body>
    <h1>Ejemplo 3</h1>

    <?php
    //Creamos una variable php
    $_nombre = "Francisco";
    ?>

    <h2>El valor de la variable es: </h2>
    <?php
    //Imprimimos la variable
    echo "<strong>$_nombre</strong> ( La variable esta declarada por encima de El valor de la variable es: ) ";
    ?>

    <h3>------------</h3>


    <h2>Diferentes formas de imprimir en php: </h2>
    <?php
    //Formas de imprimir en php
    echo "Hola Mundo <br>";
    echo "Hola, ", "mundo! <br>";
    print "Hola Mundo <br>";
    echo "Hola " . $_nombre . "<br>";
    print ("Hola " . $_nombre . "! <br>");
    echo "<h2>Hola Mundo </h2> ";
    echo 10 + 20 . "<br>";
    print 10 + 20 . "<br>";
    echo "Este es un 'ejemplo' con comillas dobles y simples <br>"
        ?>

    <h3>------------</h3>

    <h2>PrintF y Especificadores de Tipo</h2>
    <?php
    //Printf debe de llevar una cadena de conversion 
    $_ciclo = "DAW";
    $_modulo = "DWES";
    print "<p>";
    printf("%s es un modulo de %d curso de %s ", $_modulo, 2, $_ciclo);
    print "<p>";
    ?>
    <h3>Tabla de formatos principales</h3>

    <table border="1" cellspacing="0" cellpadding="6">
        <thead>
            <tr style="background-color:#f2f2f2;">
                <th>Especificador</th>
                <th>Descripción</th>
                <th>Ejemplo</th>
                <th>Salida</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>%s</td>
                <td>Cadena de texto (string)</td>
                <td><code>printf("%s", "Hola");</code></td>
                <td>Hola</td>
            </tr>
            <tr>
                <td>%d</td>
                <td>Número entero (decimal)</td>
                <td><code>printf("%d", 45);</code></td>
                <td>45</td>
            </tr>
            <tr>
                <td>%f</td>
                <td>Número de punto flotante (float)</td>
                <td><code>printf("%f", 3.1416);</code></td>
                <td>3.141600</td>
            </tr>
            <tr>
                <td>%.2f</td>
                <td>Flotante con 2 decimales</td>
                <td><code>printf("%.2f", 3.1416);</code></td>
                <td>3.14</td>
            </tr>
            <tr>
                <td>%x</td>
                <td>Número hexadecimal (minúsculas)</td>
                <td><code>printf("%x", 255);</code></td>
                <td>ff</td>
            </tr>
            <tr>
                <td>%X</td>
                <td>Número hexadecimal (mayúsculas)</td>
                <td><code>printf("%X", 255);</code></td>
                <td>FF</td>
            </tr>
            <tr>
                <td>%o</td>
                <td>Número en formato octal</td>
                <td><code>printf("%o", 8);</code></td>
                <td>10</td>
            </tr>
            <tr>
                <td>%b</td>
                <td>Número en formato binario</td>
                <td><code>printf("%b", 8);</code></td>
                <td>1000</td>
            </tr>
            <tr>
                <td>%c</td>
                <td>Carácter ASCII del número dado</td>
                <td><code>printf("%c", 65);</code></td>
                <td>A</td>
            </tr>
        </tbody>
    </table>

    <br>
    
    <h3>------------</h3>

</body>

</html>