<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando Sesiones</title>
</head>

<body style="background-color:rgb(246,243,229);">

    <h2>Usando Sesiones</h2>

    <?php
    //DESACtivo los warnings para que no molesten en la práctica
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    // Inicia una nueva sesión o recupera la sesión existente
    session_start();

    // --------------------
    // Ejemplo 1: Crear y mostrar una variable de sesión
    // --------------------

    // Crear una variable de sesión llamada 'newsession' y asignarle un valor
    $_SESSION["newsession"] = "Mi primera sesión";

    // Mostrar el valor de la variable de sesión 'newsession'
    echo "<p><strong>Valor de la sesión 'newsession':</strong> " . $_SESSION["newsession"] . "</p>";

    // --------------------
    // Ejemplo 2: Crear, mostrar y eliminar una variable de sesión
    // --------------------

    // Crear otra variable de sesión llamada 'sessiontwo'
    $_SESSION["sessiontwo"] = "Hello, I am Rafa";

    // Mostrar el valor de 'sessiontwo' antes de eliminarla
    echo "<p><strong>Antes de borrar 'sessiontwo':</strong> " . $_SESSION["sessiontwo"] . "</p>";

    // Eliminar la variable de sesión 'sessiontwo' utilizando unset()
    unset($_SESSION["sessiontwo"]);

    // Intentar mostrar la variable de sesión después de eliminarla (generará un aviso)
    echo "<p><strong>Después de borrar 'sessiontwo':</strong> " . ($_SESSION["sessiontwo"] ?? "La sesión ha sido eliminada") . "</p>";

    // --------------------
    // Ejemplo 3: Contador de visitas utilizando sesiones
    // --------------------

    // Verificar si la variable de sesión 'visitas' ya existe
    if (isset($_SESSION['visitas'])) {
        // Si existe, incrementar el contador
        $_SESSION['visitas']++;
    } else {
        // Si no existe, inicializarla con 0
        $_SESSION['visitas'] = 0;
    }

    // Mostrar el número de visitas
    echo "<p><strong>Número de visitas:</strong> " . $_SESSION['visitas'] . "</p>";

    // --------------------
    // Ejemplo 4: Almacenar la fecha y hora de cada visita
    // --------------------

    // Añadir la fecha y hora actuales al array de visitas
    $_SESSION['visitasFecha'][] = date('d-m-Y H:i:s');

    // Mostrar todas las fechas de visitas almacenadas
    echo "<p><strong>Fechas de visitas:</strong></p>";
    echo "<ul>";
    foreach ($_SESSION['visitasFecha'] as $fecha) {
        echo "<li>" . $fecha . "</li>";
    }
    echo "</ul>";

     // --------------------
    // Ejemplo 5: MOSTRANDO LAS VARIABLESDE SESIÓN CREADAS
    // --------------------

    if (!empty($_SESSION)) {
        echo "<h2>Variables de sesión creadas:</h2>";
        echo "<ul>";
        foreach ($_SESSION as $clave => $valor) {
            echo "<li><strong>$clave:</strong> $valor</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>No hay variables de sesión creadas.</h2>";
    }

    //eliminar la sesión completamente (descomentar la línea siguiente si se desea)
   // session_destroy();

     // --------------------
    // Ejemplo 5: MOSTRANDO LAS VARIABLESDE SESIÓN TRAS DESTRUIRLA
    // --------------------

    //Crea un botón para recargar la página
    echo '<form method="post"><button type="submit" name="reload">Recargar página</button></form>';
    
    //Crea un botón para destruir la sesión
    echo '<form method="post"><button type="submit" name="destroy">Destruir sesión</button></form>';
    if (isset($_POST['destroy'])) {
        session_destroy();
        // Recargar la página para reflejar los cambios
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }


    ?>
</body>

</html>