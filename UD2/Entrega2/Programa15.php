<?php
// Array simple de videojuegos
$videojuegos = ["Zelda", "FIFA", "Minecraft", "Call of Duty"];

// --- Foreach en su forma simple (solo valores)
echo "<h3>Lo mostramos con print_r()</h3>";
print_r($videojuegos);
echo "<br>";

echo "<h3>Recorrido simple con foreach</h3><br>";
foreach ($videojuegos as $juego) {
    echo "Juego: $juego <br>";
}

// --- Foreach con clave => valor
echo "<h3>Recorrido con FOREACH clave => valor</h3>";
foreach ($videojuegos as $indice => $juego) {
    echo "Índice $indice => $juego <br>";
}

// --- Matriz bidimensional: videojuegos con género
$listaJuegos = [
    ["nombre" => "Zelda", "genero" => "Aventura"],
    ["nombre" => "FIFA", "genero" => "Deportes"],
    ["nombre" => "Minecraft", "genero" => "Sandbox"],
    ["nombre" => "Call of Duty", "genero" => "Shooter"]
];

echo "<h2>Matriz bidimensional</h2>";
echo "<h3>Lo mostramos con print_r()</h3>";
print_r($listaJuegos);
echo "<br>";
echo "<h3>Recorrido de matriz bidimensional</h3>";
foreach ($listaJuegos as $item) {
    echo "El juego {$item['nombre']} es de género {$item['genero']} <br>";
}

?>

<?php
echo "<h3>Mostrando variables del servidor</h3>";

foreach ($_SERVER as $clave => $valor) {
    echo "<strong>CLAVE:</strong> $clave => <strong>VALOR:</strong> $valor <br>";
}
?>