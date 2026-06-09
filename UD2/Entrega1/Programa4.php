<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actividad - printf incompleto</title>
</head>

<body>
    <h1>Actividad con printf y sprintf</h1>

    <?php
    $aerolinea = "AirGlobal";
    $numVuelo = 1205;
    $precioBase = 245.5;
    $tasaCombustible = 12.3456;
    $ocupacion = 87;          // porcentaje de ocupación
    $codigoInterno = 0b101101;
    $distancia = 5.6e3;       // 5600 km
    $velCrucero = 902.456;     // km/h
    
    // Imprime el nombre de la aerolínea en 10 espacios, alineado a la izquierda
    printf("Aerolínea: %-10s<br>", $aerolinea);

    // Número de vuelo como entero
    printf("Vuelo Nº: %d<br>", $numVuelo);

    // Precio base con 2 decimales, en un campo de 8 caracteres
    printf("Precio base: %8.2f €<br>", $precioBase);

    // Tasa combustible con 4 decimales
    printf("Tasa combustible: %.4f €<br>", $tasaCombustible);

    // Porcentaje de ocupación (mostrar el símbolo %)
    printf("Ocupación: %d%%<br>", $ocupacion);

    // Código interno en binario
    printf("Código interno: %b<br>", $codigoInterno);

    // Distancia en notación científica
    printf("Distancia: %e km<br>", $distancia);

    // Mezcla de variables en la misma línea (vuelo y velocidad)
    echo "<br>";

    printf("El vuelo %d de %s vuela a %.3f km/h<br>", $numVuelo, $aerolinea, $velCrucero);
    echo '<span style="color:red;">Habrá que poner tantos formatos como variables haya, lo que va con % son los formatos.</span><br>';
    sprintf('', $numVuelo);
    ?>

    <?php
    // Ejemplo con sprintf (genera una cadena formateada sin imprimir)
    $mensaje = sprintf(
        "El vuelo %d de %s recorrerá %.1f km con un %d%% de ocupación.",
        $numVuelo,
        $aerolinea,
        $distancia,
        $ocupacion
    );

    // Ahora lo mostramos con echo
    echo "<p><em>Mensaje generado con sprintf:</em> $mensaje</p>";
?>


</body>

</html>