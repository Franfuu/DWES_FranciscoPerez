<?php
// form.php - recoge y muestra datos del formulario

//almacenamos las variables superglobales en variables locales tras tratar los carácteres especiales
// ?? '' indica que si no se ha recibido, se pone una cadena vacía
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre  = htmlspecialchars($_POST['nombre'] ?? '');
    $email   = htmlspecialchars($_POST['email'] ?? '');
    $mensaje = htmlspecialchars($_POST['mensaje'] ?? '');
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Datos recibidos</title>
</head>
<body>
  <h1>Datos recibidos del formulario</h1>
  <?php if (!empty($nombre) && !empty($email) && !empty($mensaje)): ?>
    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Mensaje:</strong><br><?php echo nl2br($mensaje); ?></p>
  <?php else: ?>
    <p style="color:red;">No se recibieron todos los datos correctamente.</p>
  <?php endif; ?>
</body>
</html>