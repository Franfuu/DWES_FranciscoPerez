<?php
// Programa.php - Radio buttons (turno)
$turno = $_POST['turno'] ?? '';
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Programa30 - Radio</title></head>
<body>
<h1>Programa - Elegir turno (radio)</h1>
<form method="post" action="">
  <label><input type="radio" name="turno" value="mañana" <?php if($turno==='mañana') echo 'checked'; ?>> Mañana</label><br>
  <label><input type="radio" name="turno" value="tarde" <?php if($turno==='tarde') echo 'checked'; ?>> Tarde</label><br>
  <label><input type="radio" name="turno" value="noche" <?php if($turno==='noche') echo 'checked'; ?>> Noche</label><br>
  <button type="submit">Enviar</button>
</form>
<?php if ($turno !== ''): ?>
  <p>Turno seleccionado: <strong><?php echo htmlspecialchars($turno); ?></strong></p>
<?php endif; ?>
</body>
</html>