<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cadenas y secuencias de escape en PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            line-height: 1.5;
        }

        pre {
            background: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
        }

        h2 {
            margin-top: 25px;
        }
    </style>
</head>

<body>
    <h1>Estudio de cadenas y secuencias de escape en PHP</h1>

    <?php
    // Ejemplos con comillas dobles (interpreta escapes)
    $dobles = "Hola\nMundo\t(esto está tabulado)\nComilla doble: \"  Barra invertida: \\  Variable: \$valor";

    // Ejemplos con comillas simples (no interpreta escapes, salvo \' y \\)
    $simples = 'Hola\nMundo\t(esto aparece literal)\nComilla simple: \'  Barra invertida: \\  Variable: $valor';

    // Unicode y Hex
    $unicode = "Avión: \u{2708} (símbolo avión)";
    $hex = "Códigos hexadecimales: \x41\x42\x43 = ABC";

    // Heredoc (interpreta escapes)
    $heredoc = <<<TEXT
Cadena con heredoc:
- Nueva línea \n (se interpreta)
- Tabulación \t (se interpreta)
- Variable \$unicode: $unicode
TEXT;

    // Nowdoc (no interpreta escapes)
    $nowdoc = <<<'TEXT'
Cadena con nowdoc:
- Nueva línea \n (literal)
- Tabulación \t (literal)
- Variable $unicode (no sustituida)
TEXT;
    ?>

    <h2>Con comillas dobles</h2>
    <pre><?php echo $dobles; ?></pre>

    <h2>Con comillas simples</h2>
    <pre><?php echo $simples; ?></pre>

    <h2>Unicode y Hex</h2>
    <pre><?php echo $unicode . "\n" . $hex; ?></pre>

    <h2>Heredoc</h2>
    <pre><?php echo $heredoc; ?></pre>

    <h2>Nowdoc</h2>
    <pre><?php echo $nowdoc; ?></pre>
</body>

</html>