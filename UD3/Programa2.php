<?php
class Animal {
    // Propiedades de la clase
    public $especie;
    public $edad;

    // Constructor de la clase
    public function __construct($especie, $edad) {
        $this->especie = $especie;  // Asigna el valor del parámetro $nombre a la propiedad $especie del objeto
        $this->edad = $edad;      // Asigna el valor del parámetro $edad a la propiedad $edad del objeto
    }

    // Método para mostrar información de la persona
    public function mostrarInfo() {
        return "Especie: $this->especie, Edad: $this->edad <br>";
    }
}

// Crear una instancia de la clase Animal usando el constructor
$especie1 = new Animal("Perro", 8);
echo $especie1->mostrarInfo(); // Salida: Nombre: Perro, Edad: 8

$persona2 = new Animal("Gato", 5);
echo $persona2->mostrarInfo(); // Salida: Nombre: Gato, Edad: 5
?>

<?php
class Coche {
    public $marca;
    public $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }
// Método para obtener información del coche
    public function obtenerInformacion() {
        return "Este es un coche de la marca $this->marca, modelo $this->modelo. <br>";
    }
}

//Crear instancias de la clase Coche
$coche1 = new Coche("Peugeot", "Corolla");
$coche2 = new Coche("Ford", "Focus");

echo $coche1->obtenerInformacion(); // Salida: "Este es un coche de la marca Toyota, modelo Corolla."
echo $coche2->obtenerInformacion() ;// Salida: "Este es un coche de la marca Ford, modelo Focus."

?>