<?php
// Programa.php - Validación de email (formato)
$errores = [];
$email  = $_POST['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($email === '') {
        $errores[] = 'El email es obligatorio.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El formato de email no es válido.';
    }
}
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Programa36 - Validación email</title></head>
<body>
<h1>Programa - Validación de email</h1>
<?php if (!empty($errores)): ?>
  <ul style="color:crimson;">
    <?php foreach ($errores as $e): ?><li><?php echo htmlspecialchars($e); ?></li><?php endforeach; ?>
  </ul>
<?php endif; ?>
<form method="post" action="">
  <p><label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="usuario@dominio.com"></label></p>
  <button type="submit">Validar</button>
</form>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errores)): ?>
  <p> Email válido: <strong><?php echo htmlspecialchars($email); ?></strong></p>
<?php endif; ?>
</body>
</html>