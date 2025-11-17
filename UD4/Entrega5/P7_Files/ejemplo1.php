<?php
$archivo = 'notas.txt';

// 1. Escribir
$texto = "Primera línea de texto\nSegunda línea\n";
$f = fopen($archivo, 'w');
fwrite($f, $texto);
fclose($f);

// 2. Leer
$f = fopen($archivo, 'r');
while (!feof($f)) {
    echo fgets($f) . "<br>";
}
fclose($f);
?>