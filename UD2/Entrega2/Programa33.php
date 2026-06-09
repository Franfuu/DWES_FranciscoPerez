<?php
// Programa.php - Select (país)
$pais = $_POST['pais'] ?? '';
$paises = ['España','Francia','Italia','Alemania','Portugal'];
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Programa32 - Select</title></head>
<body>
<h1>Programa - Selección de país (select)</h1>
<form method="post" action="">
  <label>País:
    <select name="pais">
      <option value="">-- Selecciona --</option>
      <?php foreach ($paises as $p): ?>
        <option value="<?php echo htmlspecialchars($p); ?>" <?php if($pais===$p) echo 'selected'; ?>><?php echo htmlspecialchars($p); ?></option>
      <?php endforeach; ?>
    </select>
  </label>
  <button type="submit">Enviar</button>
</form>
<?php if ($pais !== ''): ?>
  <p>Has elegido: <strong><?php echo htmlspecialchars($pais); ?></strong></p>
<?php endif; ?>
</body>
</html>