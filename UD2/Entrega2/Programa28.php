<?php
// Procesar el formulario al enviarlo
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1️ Comprobar si el nombre está vacío
    if (empty($_POST["nombre"])) {
        echo "<p style='color:red;'>El campo nombre está vacío.</p>";
    } else {
        echo "<p>Nombre: " . htmlspecialchars($_POST["nombre"]) . "</p>";
    }

    // 2️ Comprobar las aficiones (checkboxes)
    if (!empty($_POST["aficiones"])) {
        $aficiones = $_POST["aficiones"];
        echo "<p>Aficiones seleccionadas: " . implode(", ", $aficiones) . "</p>";

        // 3️ Verificar si “deporte” está entre las seleccionadas
        if (in_array("deporte", $aficiones)) {
            echo "<p>Te gusta el deporte! </p>";
        }
    } else {
        echo "<p>No has marcado ninguna afición.</p>";
    }
}
?>

<form method="post" action="">
    <label>Nombre:</label>
    <input type="text" name="nombre"
        value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>">
    <br><br>

    <label>Aficiones:</label><br>
    <input type="checkbox" name="aficiones[]" value="musica" <?php if (!empty($_POST['aficiones']) && in_array('musica', $_POST['aficiones']))
        echo "checked"; ?>>
    Música<br>

       <input type="checkbox" name="aficiones[]" value="ninguna" <?php if (!empty($_POST['aficiones']) && in_array('ninguna', $_POST['aficiones']))
        echo "checked"; ?>>
    Ninguna<br>


    <input type="checkbox" name="aficiones[]" value="deporte" <?php if (!empty($_POST['aficiones']) && in_array('deporte', $_POST['aficiones']))
        echo "checked"; ?>>
    Deporte<br>

    <input type="checkbox" name="aficiones[]" value="lectura" <?php if (!empty($_POST['aficiones']) && in_array('lectura', $_POST['aficiones']))
        echo "checked"; ?>>
    Lectura<br><br>

    <input type="submit" value="Enviar">
</form>