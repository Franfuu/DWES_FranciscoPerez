<?php
// Ejemplo de definición de array simple

$array1 = array(
    "foo" => "bar",
    "bar" => "foo",
);

// a partir de PHP 5.4
$array2 = [
    "foo" => "bar",
    "bar" => "foo",
];

// Mostrar todo el array 1
echo "<pre>";
print_r($array1);
echo "</pre>";

// Mostrar un valor específico
echo "Valor de foo en array1: " . $array1["foo"] . "<br>";
echo "Valor de bar en array1: " . $array1["bar"] . "<br>";

// Mostrar todo el array 2
echo "<pre>";
print_r($array2);
echo "</pre>";

//Array creado paso a paso
$modulos1[0] = "Programación";
$modulos1[1] = "Bases de datos";
$modulos1[2] = "Desarrollo web en entorno servidor";

//Array creado paso a paso sin decir posición
$modulos2[] = "Programación";
$modulos2[] = "Bases de datos";
$modulos2[] = "Desarrollo web en entorno servidor";

echo " <br> Modulos 2: ";
print_r($modulos2);

echo " <br>  ";

?>
