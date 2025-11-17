<?php
$datos = [
    ['Nombre', 'Edad', 'Ciudad'],
    ['Ana', 22, 'Sevilla'],
    ['Juan', 25, 'Málaga']
];

$fp = fopen('personas.csv', 'w');
foreach ($datos as $fila) {
    fputcsv($fp, $fila, ';');
}
fclose($fp);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="personas.csv"');
readfile('personas.csv');
?>