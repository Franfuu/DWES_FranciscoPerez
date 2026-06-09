<?php
// Programa14.php
echo "<h3>Ejemplo con for</h3>";
for ($i = 1; $i <= 5; $i++) {
    echo "Número: $i <br>";
}

echo "<h3>Ejemplo con while</h3>";
$j = 2;
while ($j <= 10) {
    echo "Par: $j <br>";
    $j += 2;
}

echo "<h3>Ejemplo con do...while</h3>";
$k = 5;
do{
    echo "Cuenta atrás: $k <br>";
    $k--;
} while ($k >= 0);
?>