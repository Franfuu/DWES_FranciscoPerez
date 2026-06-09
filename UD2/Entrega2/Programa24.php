<?php
// Array inicial con algunos coches
$concesionario = array(
    "c1" => "Ford Fiesta",
    "c2" => "Seat Ibiza",
    "c3" => "Renault Clio"
);

// 1. Añadir un coche nuevo
$concesionario["c4"] = "Peugeot 208";

// 2. Modificar un coche existente
$concesionario["c2"] = "Seat León";

// 3. Eliminar un coche
unset($concesionario["c1"]); // Eliminamos el Ford Fiesta

// 4. Reindexar si fuera numérico
// (aquí no hace falta porque usamos claves de texto)
// Ejemplo con numérico:
$cochesNum = array("BMW", "Audi", "Mercedes");
unset($cochesNum[1]);  // elimina "Audi"
$cochesNum = array_values($cochesNum); // reindexa desde 0

// 5. Comprobar si es array
if (is_array($concesionario)) {
    echo "✔ Es un array<br>";
}else{
    echo "✘ No es un array<br>";
}

// 6. Contar coches
echo "El concesionario tiene " . count($concesionario) . " coches<br>";

// 7. Buscar un coche concreto
if (in_array("Renault Clio", $concesionario)) {
    echo "✔ El Renault Clio está en el concesionario<br>";
}

// 8. Buscar coche y obtener clave
$clave = array_search("Peugeot 208", $concesionario);
if ($clave !== false) {
    echo "El Peugeot 208 tiene la clave: $clave<br>";
}

// 9. Comprobar si existe una clave
if (array_key_exists("c3", $concesionario)) {
    echo "✔ Existe la clave 'c3' en el concesionario<br>";
}

// Mostrar el array final
echo "<pre>";
print_r($concesionario);
echo "</pre>";
?>