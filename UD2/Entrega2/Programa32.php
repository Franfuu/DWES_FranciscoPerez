<?php
// Programa.php - Checkboxes (aficiones)
$aficiones = $_POST['aficiones'] ?? [];
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Programa31 - Checkboxes</title></head>
<body>
<h1>Programa - Aficiones (checkbox)</h1>
<form method="post" action="">
  <?php
    $lista = ['música','deporte','lectura','cine','viajes'];
    foreach ($lista as $op) {
        $checked = in_array($op, $aficiones) ? 'checked' : '';
        echo "<label><input type='checkbox' name='aficiones[]' value='".htmlspecialchars($op)."' $checked> ".htmlspecialchars($op)."</label><br>";
    }
  ?>
  <button type="submit">Enviar</button>
</form>
<?php if (!empty($aficiones)): ?>
  <p>Seleccionadas: <strong><?php echo htmlspecialchars(implode(', ', $aficiones)); ?></strong></p>
<?php endif; ?>
</body>
</html>