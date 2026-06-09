<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2 - Formularios en PHP</title>
</head>

<body>
    <h1>FORMULARIOS EN PHP</h1>
    <p>Los formularios permiten que el usuario introduzca datos en el navegador y que PHP los procese.
        Todos los campos enviados estarán disponibles en el script PHP indicado en <code>action</code>.</p>

    <h3>1. Estructura básica de un formulario</h3>
    <p>Etiqueta <code>&lt;form&gt;</code> con atributos <strong>action</strong> y <strong>method</strong> (GET o POST).
    </p>

    <pre>
<form method="post" action="accion.php">
    Nombre: <input type="text" name="nombre" required><br>
    Email: <input type="email" name="email" required><br>
    Mensaje:<br>
    <textarea name="mensaje" rows="4" cols="40" required></textarea><br>
    <button type="submit">Enviar</button>
</form>
    </pre>

    <h3>2. Recoger datos en PHP (POST/GET)</h3>
    <pre>
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre  = htmlspecialchars($_POST['nombre'] ?? '');
    $email   = htmlspecialchars($_POST['email'] ?? '');
    $mensaje = htmlspecialchars($_POST['mensaje'] ?? '');
}
    </pre>

    <h3>3. Arrays en formularios (checkbox)</h3>
    <p>Si un campo puede tener múltiples valores, se envía como array añadiendo corchetes al nombre.</p>

    <pre>
<input type="checkbox" name="modulos[]" value="DWES"> Desarrollo web servidor<br>
<input type="checkbox" name="modulos[]" value="DWEC"> Desarrollo web cliente<br>
    </pre>

    <h3>Procesar valores seleccionados</h3>
    <pre>
$modulos = $_POST['modulos'] ?? [];
foreach ($modulos as $modulo) {
    echo "Módulo: $modulo<br>";
}
    </pre>

    <h3>4. Reutilizar valores en formularios</h3>
    <p>Para que los datos no se pierdan tras enviar el formulario:</p>
    <pre>
<input type="text" name="nombre" 
       value="<?= isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '' ?>">

<input type="checkbox" name="modulos[]" value="DWES"
       <?= !empty($_POST['modulos']) && in_array('DWES', $_POST['modulos']) ? 'checked' : '' ?>>
    </pre>

    <h3>5. Validación de datos</h3>
    <p>Validar si los campos están vacíos o si un valor existe en un array:</p>
    <pre>
if (isset($_POST['enviar']) && empty($_POST['nombre'])) {
    echo "&lt;span style='color:red'&gt;Debe introducir un nombre!!&lt;/span&gt;";
}

if (isset($_POST['modulos']) && empty($_POST['modulos'])) {
    echo "&lt;span style='color:red'&gt;Debe escoger al menos uno!!&lt;/span&gt;";
}
    </pre>


    </form>
    </pre>

    <h3>7. Funciones y atributos importantes</h3>
    <ul>
        <li><strong>$_POST / $_GET:</strong> Recogen datos enviados.</li>
        <li><strong>$_REQUEST:</strong> Combina GET y POST.</li>
        <li><strong>empty():</strong> Comprobar campos vacíos.</li>
        <li><strong>isset():</strong> Comprobar si una variable existe.</li>
        <li><strong>htmlspecialchars():</strong> Evita inyección de código.</li>
        <li><strong>value / checked:</strong> Mantener valores tras envío.</li>
        <li><strong>in_array():</strong> Comprobar si un valor está en un array.</li>
        <li><strong>$_SERVER['PHP_SELF']:</strong> Procesar el mismo archivo.</li>
    </ul>

    <h3>8. Ejemplo completo</h3>
    <pre>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
        echo "&lt;p style='color:red;'&gt;El campo nombre está vacío.&lt;/p&gt;";
    } else {
        echo "&lt;p&gt;Nombre: " . htmlspecialchars($_POST["nombre"]) . "&lt;/p&gt;";
    }

    $aficiones = $_POST["aficiones"] ?? [];
    if (!empty($aficiones)) {
        echo "&lt;p&gt;Aficiones: " . implode(", ", $aficiones) . "&lt;/p&gt;";
        if (in_array("deporte", $aficiones))
            echo "&lt;p&gt;Te gusta el deporte!&lt;/p&gt;";
    } else {
        echo "&lt;p&gt;No has marcado ninguna afición.&lt;/p&gt;";
    }
}
?>

<form method="post" action="">
    Nombre: <input type="text" name="nombre"
           value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>"><br>
    Aficiones:<br>
    <input type="checkbox" name="aficiones[]" value="musica"
           <?= !empty($_POST['aficiones']) && in_array('musica', $_POST['aficiones']) ? 'checked' : '' ?>> Música<br>
    <input type="checkbox" name="aficiones[]" value="deporte"
           <?= !empty($_POST['aficiones']) && in_array('deporte', $_POST['aficiones']) ? 'checked' : '' ?>> Deporte<br>
    <input type="checkbox" name="aficiones[]" value="lectura"
           <?= !empty($_POST['aficiones']) && in_array('lectura', $_POST['aficiones']) ? 'checked' : '' ?>> Lectura<br>
    <input type="submit" value="Enviar" name="enviar">
</form>
    </pre>
</body>

</html>