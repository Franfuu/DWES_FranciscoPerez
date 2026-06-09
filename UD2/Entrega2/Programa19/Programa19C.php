<?php
echo "<h2>Pruebas de include / require</h2>";
// 3. include_once (solo se incluirá una vez)
include_once "funciones.php";
include_once "funciones.php"; // se ignora
echo "3 x 4 = " . multiplicar(3, 4) . "<br>";
?>