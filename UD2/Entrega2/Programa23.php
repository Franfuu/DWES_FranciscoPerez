<?php
// Definir el array con ciudades
$ciudades = array("Sevilla", "Granada", "Córdoba", "Málaga", "Cádiz");

/* Programa23: COPIA COLOCA LAS FUNCIONES DONDE CORRESPONDADN :
next($ciudades) 
reset($ciudades) 
prev($ciudades) 
end($ciudades) 
*/

// 1. "FUNCION ARRAY ???" → primer elemento
echo "Primer elemento con : " . reset($ciudades) . "<br>";
echo "Clave actual: " . key($ciudades) . "<br><br>";

// 2. "FUNCION ARRAY ???" → avanzar
echo "Siguiente Elemento con : " . next($ciudades) . "<br>";
echo "Clave actual: " . key($ciudades) . "<br><br>";

// 3. "FUNCION ARRAY ???" → retroceder
echo "Elemento con  : " . prev($ciudades) . "<br>";
echo "Clave actual: " . key($ciudades) . "<br><br>";

// 4. "FUNCION ARRAY ???" → último elemento
echo "Último elemento con : " . end($ciudades)  . "<br>";
echo "Clave actual: " . key($ciudades) . "<br><br>";

// 5. next() después del último → fuera del array
$valor = next($ciudades);
if ($valor === false && key($ciudades) === null) { 
    echo "El puntero está fuera del array (hemos pasado el final).<br>";
} else {
    echo "Elemento actual: $valor<br>";
}

//Vamos a forzar a forzar que se muestre
echo "Elemento con next() fuera del array: " . next($ciudades) . "<br>";
echo "Clave actual: " . key($ciudades) . "<br><br>";
?>