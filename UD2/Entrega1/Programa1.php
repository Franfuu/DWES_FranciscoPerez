<?php
// Programa 1

echo "<span style='color: red;'>Programa 1!</span><br>";
echo "<span style='color: green;'>Hola 1!</span><br>";
echo "<span style='color: blue;'>Esta es la primera línea.</span><br>";
echo "<span style='color: orange;'>Esta es la segunda línea.</span><br>";
echo "<h1 style='color: red;'>Programa 1 en HTML</h1>";

/*
Este es un comentario
de múltiples líneas
*/

// Variables simples
$numero = 42;
$precio = 19.99;
$saludo = "¡Hola, Mundo!";
$esVerdadero = true;

echo "<span style='color: purple;'>$saludo</span><br>";
echo "<span style='color: navy;'>Número: $numero</span><br>";
echo "<span style='color: navy;'>Float: $precio</span><br>";
echo "<span style='color: navy;'>Boleano: $esVerdadero</span><br>";

// Arrays           
$colores = ["Rojo", "Verde", "Azul"];
echo "<span style='color: teal;'>$colores[0]</span><br>"; // Pintar el elemento 0 del array
echo "<span style='color: brown;'>$saludo</span><br>";

//Probando el ambito de las variables
$variableGlobal = "Soy una variable global";
$x = 10; //Ambito global

function pruebaAmbito()
{
    global $variableGlobal; // Acceder a la variable global
    $y = 20; // Ambito local
    echo "<p>Dentro de la función: $variableGlobal e y = $y</p>";
}

pruebaAmbito();

//Contador
function contador()
{
    $contador = 0;
    $contador++;
    echo "<p>Contador: $contador</p>";
}
contador();

// Clase Coche
class Coche
{
    public $marca;

    public function __construct($marca)
    {
        $this->marca = $marca;
    }
}

$miCoche = new Coche("Toyota");
echo "<p>Mi coche es de marca: <strong>" . $miCoche->marca . "</strong></p>";

// Ejemplo 2: Variables y concatenación
$nombre = "Francisco";
$edad = 21;
echo "<p>Hola, mi nombre es <b>" . $nombre . "</b> y tengo " . $edad . " años.</p>";

// Ejemplo 3: Arrays y bucles
$frutas = ["Manzana", "Pera", "Platano", "Naranja"];
echo "<h2>Lista de frutas:</h2>";
echo "<ul>";
foreach ($frutas as $fruta) {
    echo "<li>" . $fruta . "</li>";
}
echo "</ul>";

// Ejemplo 4: Funciones
function sumar($a, $b)
{
    return $a + $b;
}

$resultado = sumar(5, 7);
echo "<p>La suma es: <strong>" . $resultado . "</strong></p>";

// Ejemplo 5: Clase Persona
class Persona
{
    public $nombre;
    public $edad;

    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function saludar()
    {
        return "Hola, soy " . $this->nombre . " y tengo " . $this->edad . " años.";
    }
}

$persona1 = new Persona("Francisco", 21);
echo "<p>" . $persona1->saludar() . "</p>";
?>