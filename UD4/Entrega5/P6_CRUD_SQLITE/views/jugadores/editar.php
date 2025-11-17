<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Editar jugador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/CSS/style.css">
</head>
<body>
  <h1>Editar jugador #<?= (int)$jugador['id'] ?></h1>
  <?php require __DIR__ . '/_form.php'; ?>
</body>
</html>