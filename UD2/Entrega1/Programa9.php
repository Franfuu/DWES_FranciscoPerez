<?php
// Fecha y hora actual
echo "<p>Fecha y hora actual: " . date("d/m/Y H:i:s") . "</p>";

// Solo la fecha
echo "<p>Fecha de hoy: " . date("d-m-Y") . "</p>";

// Solo la hora
echo "<p>Hora actual: " . date("H:i:s") . "</p>";

// Día de la semana
echo "<p>Día de la semana: " . date("l") . "</p>";

// Día, mes y año por separado
echo "<p>Día: " . date("d") . "</p>";
echo "<p>Mes: " . date("F") . "</p>"; // Nombre completo del mes
echo "<p>Mes abreviado: " . date("M") . "</p>";
echo "<p>Año: " . date("Y") . "</p>";

// Semana del año
echo "<p>Semana del año: " . date("W") . "</p>";

// Día del año
echo "<p>Día del año: " . date("z") . "</p>";

// AM/PM
echo "<p>Hora con AM/PM: " . date("h:i:s A") . "</p>";

// Timestamp actual
echo "<p>Timestamp actual: " . time() . "</p>";
?>
