<?php
// Programa.php - Usuario y contraseña (demo sin seguridad)
$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['clave'] ?? '';
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Programa29 - Login básico</title></head>
<body>
<h1>Programa - Formulario de acceso (demo)</h1>
<form method="post" action="">
  <label>Usuario: <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>"></label><br>
  <label>Contraseña: <input type="password" name="clave"></label><br>
  <button type="submit">Entrar</button>
</form>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
  <p>Has enviado usuario <strong><?php echo htmlspecialchars($usuario); ?></strong>.</p>
  <small>Nota: Ejemplo educativo. No almacenar ni mostrar contraseñas en claro.</small>
<?php endif; ?>
</body>
</html>