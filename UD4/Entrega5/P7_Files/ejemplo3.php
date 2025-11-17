<?php
$archivo = 'notas.txt';
$f = fopen($archivo, 'a');
fwrite($f, "Nueva línea añadida.\n");
fclose($f);
?>