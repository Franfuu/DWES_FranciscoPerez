<?php
echo nl2br(file_get_contents('notas.txt')); // lee todo el contenido
$lineas = file('notas.txt'); // devuelve array con cada línea
print_r($lineas);
?>