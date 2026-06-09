<?php
echo "<h2>Programa20 - Funciones más usadas en PHP</h2><br>";

// 1. strlen() → Longitud de una cadena
$cadena = "Programación en PHP";
echo "La longitud de '$cadena' es: " . strlen($cadena) . "<br>";

echo "<hr>";

// 2. strtoupper() → Convertir a mayúsculas
echo "En mayúsculas: " . strtoupper($cadena) . "<br>";

echo "<hr>";

// 3. strtolower() → Convertir a minúsculas
echo "En minúsculas: " . strtolower($cadena) . "<br>";

echo "<hr>";

// 4. substr() → Extraer parte de una cadena
echo "Subcadena (0 a 11): " . substr($cadena, 0, 11) . "<br>";

echo "<hr>";

// 5. date() → Fecha actual en formato personalizado
echo "Fecha actual: " . date("d/m/Y H:i:s") . "<br>";

echo "<hr>";

// 6. number_format() → Formatear un número con separadores
$precio = 12345.6789;
echo "Precio formateado: " . number_format($precio, 2, ",", ".") . " €<br>";

echo "<hr>";

// 7. rand() → Número aleatorio entre un rango
echo "Número aleatorio entre 1 y 100: " . rand(1, 100) . "<br>";

echo "<hr>";

// 8. array_sum() → Sumar todos los valores de un array
$numeros = [2, 4, 6, 8, 10];
echo "Suma de [2,4,6,8,10]: " . array_sum($numeros) . "<br>";

echo "<hr>";

// 9. in_array() → Verificar si un valor está en un array
$colores = ["rojo", "verde", "azul"];
echo "¿Existe 'verde' en el array de colores? " . (in_array("verde", $colores) ? "Sí" : "No") . "<br>";

echo "<hr>";

// 10. implode() → Convertir array a cadena
echo "Colores en un array: " . implode(", ", $colores) . "<br>";