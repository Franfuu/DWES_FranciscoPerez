<?php
// Clase final: no se puede heredar de ella
final class Calculadora {
    public function sumar($a, $b) {
        return $a + $b;
    }

    public function restar($a, $b) {
        return $a - $b;
    }
}

// Crear un objeto y usar la clase
$calc = new Calculadora();
echo $calc->sumar(5, 3);   // Resultado: 8
echo "<br>";
echo $calc->restar(10, 4); // Resultado: 6

// Esto provocaría un error fatal:
// class MiCalculadora extends Calculadora {}
?>

<?php  //Métodos final
class Base {
    final public function conectar() {
        echo "Conexión establecida";
    }
}

class Derivada extends Base {
    // Error si ... ???
    // public function conectar() {
}

// Crear un objeto y usar la clase

?>

<?php
final class Email
{
    private string $value;

    public function __construct(string $value)
    {
        // Validación simple
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Email no válido");
        }
        $this->value = strtolower($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    // Comparación de valor (útil en tests)
    public function equals(Email $other): bool
    {
        // Comparar valores en minúsculas para ignorar mayúsculas/minúsculas 
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}

// Uso
$e1 = new Email("Alumno@IES.edu");
$e2 = new Email("alumno@ies.edu");
var_dump($e1->equals($e2)); // bool(true)
echo "<br>";
echo "Clase Email usada correctamente., Eliminada la herencia de la clase Email.";
