<?php
function saludar($nombre) {
    return "Hola, $nombre. Bienvenido.";
}

function despedir($nombre) {
    return "Adiós, $nombre. Hasta pronto.";
}

function multiplicar($a, $b) {
    return $a * $b;
}

function dividir($a, $b) {
    if ($b == 0) {
        return "Error: división por cero";
    }
    return $a / $b;
}
?>