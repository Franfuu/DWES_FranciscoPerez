<?php
// Programa 6- Comprobación y conversión de tipos
/*
En este ejercicio trabajaremos con las funciones de  **tipos de datos en PHP** .

1. Declara las siguientes variables:
   * Una cadena con el valor `"Hola mundo"`.
   * Un número entero con el valor `25`.
   * Un número decimal con el valor `12.34`.
   * Un array con los valores `avión, helicóptero, dron`.
   * Una variable con valor `null`.
2. Muestra el **tipo de cada variable** utilizando la función `gettype()`.
3. Comprueba si las variables son de un tipo concreto utilizando al menos 5 de las siguientes funciones:
   * `is_array()`, `is_bool()`, `is_float()`, `is_integer()`, `is_null()`, `is_numeric()`, `is_object()`, `is_resource()`, `is_scalar()`, `is_string()`.
4. Convierte la variable decimal en cadena usando `settype()` y muestra antes y después el tipo de dato.
5. Comprueba si la variable entera está definida y no es `null` con `isset()`.
6. Elimina la variable entera con `unset()` y demuestra que ya no existe.
*/

// 1. Declaración de variables
$cadena = "Hola mundo";
$entero = 25;
$decimal = 12.34;
$lista = array("avión", "helicóptero", "dron");
$nulo = null;
$cadenaPrueba = "Hola mundo2";
settype($cadenaPrueba, "float");

// 2. Mostrar tipo con gettype
echo "Tipo de cadena: " . gettype($cadena) . "<br>";
echo "Tipo de entero: " . gettype($entero) . "<br>";
echo "Tipo de cadenaPrueba: " . gettype($cadenaPrueba) .  "$cadenaPrueba <br>";
// 3. Comprobaciones con is_...
if (is_string($cadena)) {
    echo "La variable es una cadena<br>";
}
if (is_array($lista)) {
    echo "La variable es un array<br>";
}

// 4. Conversión con settype
echo "Antes de convertir: " . gettype($decimal) . "<br>";
settype($decimal, "integer");
echo "Después de convertir: " . gettype($decimal) . "<br>";

// 5. isset
if (isset($lista)) {
    echo "La variable está definida y no es null<br>";
}

// 6. unset
unset($entero);
echo "Después de unset: " . (isset($entero) ? "existe" : "no existe") . "<br>";

// 7 mostramos variable No definida
echo "<br>Mostramos variable no definida antes de desactivar los Warnings:$entero";  // Notice: Undefined variable: entero



// Oculta todos los warnings (aunque se sigan generando internamente)
error_reporting(0);// 7 mostramos variable No definida
echo "<br>Mostramos variable no definida despues de desactivar los Warnings:$entero";  // Notice: Undefined variable: entero
ini_set('display_errors', 0);

echo $variableInexistente; // No muestra nada en pantalla


?>

