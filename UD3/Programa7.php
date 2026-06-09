<?php
class Cuenta {
     private $saldo = 0;

    public function depositar($cantidad) {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
        }
    }

    public function obtenerSaldo() {
        return $this->saldo; 
    }
}

$cuenta = new Cuenta();
$cuenta->depositar(100);
$cuenta->depositar(100);
echo "Saldo actual: " . $cuenta->obtenerSaldo() . " €";
?>