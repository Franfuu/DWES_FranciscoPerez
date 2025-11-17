<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Enviar Datos en JSON sin JavaScript</title>
</head>
<body>
    <h1>Formulario para Enviar Datos en JSON</h1>
    <form action="procesar.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>


        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>


        <input type="submit" value="Enviar">
    </form>
</body>
</html>