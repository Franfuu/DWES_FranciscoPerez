<?php
// Función simple sin argumentos
function precioConIVA(): float {
    $precio= 100;  // definido dentro de la función
    $iva = 21;      // definido dentro de la función
    $precioFinal = $precio + ($precio * $iva / 100);
    return round($precioFinal, 2);
}

// Ejemplo de uso
echo "Precio con IVA: " . precioConIVA() . " €<br>";


$iva = true;
$precio = 10;
print "Llamada antes de la condicional";

if ($iva) {
    function precio_con_iva_condi(){
        global $precio;
        $precioiva = $precio * 1.21;
        print "El precio con IVA es $precioiva";
    }
}

print "Llamada después de la condicional";
precio_con_iva_condi();
?>