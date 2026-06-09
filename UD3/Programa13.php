<?php
// Definición del trait
trait Registro {
    public function registrarAccion($mensaje) {
        $fecha = date('Y-m-d H:i:s');
        echo "[$fecha] $mensaje<br>";
    }
}


// Clase que usa el trait
class Usuario {
    use Registro; // "inyecta" los métodos del trait


    public function login($nombre) {
        $this->registrarAccion("El usuario '$nombre' ha iniciado sesión.");
    }
}


class Producto {
    use Registro; // "inyecta" los métodos del trait


    public function crear($nombre) {
        $this->registrarAccion("Se ha creado el producto '$nombre'.");
    }
}


// Uso
$u = new Usuario();
$u->login("francisco.perez");



$p = new Producto();
$p->crear("Camiseta");
?>
