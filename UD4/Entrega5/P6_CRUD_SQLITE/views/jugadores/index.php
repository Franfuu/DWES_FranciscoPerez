<?php
function e(string $s): string
{
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Jugadores</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/CSS/style.css">
</head>

<body>
  <div class="topbar">
    <h1>Listado de jugadores</h1>
    <p><a class="btn" href="?action=crear">Nuevo jugador</a></p>
  </div>

  <?php if (empty($jugadores)): ?>
    <p>No hay jugadores registrados.</p>
  <?php else: ?>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Usuario</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($jugadores as $j): ?>
          <tr>
            <td><?= (int)$j['id'] ?></td>
            <td><?= e($j['usuario']) ?></td>
            <td><?= e($j['nombre']) ?></td>
            <td><?= e($j['apellidos']) ?></td>
            <td class="actions">
              <a class="link" href="?action=editar&id=<?= (int)$j['id'] ?>">Editar</a>
              <form action="?action=eliminar&id=<?= (int)$j['id'] ?>" method="post" onsubmit="return confirm('¿Eliminar este jugador?');">
                <button class="btn danger" type="submit">Eliminar</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</body>

</html>