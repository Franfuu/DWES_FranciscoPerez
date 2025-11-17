<?php
function e(string $s): string
{
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
$esEdicion = isset($jugador['id']);
$action = $esEdicion ? '?action=update&id=' . (int)$jugador['id'] : '?action=store';
?>
<form action="<?= $action ?>" method="post" autocomplete="off" class="form">
  <div class="field">
    <label>Usuario</label>
    <input type="text" name="usuario" value="<?= e($jugador['usuario'] ?? '') ?>" required>
    <?php if (!empty($errors['usuario'])): ?><small class="error"><?= e($errors['usuario']) ?></small><?php endif; ?>
  </div>
  <div class="field">
    <label>Nombre</label>
    <input type="text" name="nombre" value="<?= e($jugador['nombre'] ?? '') ?>" required>
    <?php if (!empty($errors['nombre'])): ?><small class="error"><?= e($errors['nombre']) ?></small><?php endif; ?>
  </div>
  <div class="field">
    <label>Apellidos</label>
    <input type="text" name="apellidos" value="<?= e($jugador['apellidos'] ?? '') ?>" required>
    <?php if (!empty($errors['apellidos'])): ?><small class="error"><?= e($errors['apellidos']) ?></small><?php endif; ?>
  </div>
  <p class="actions">
    <button class="btn primary" type="submit"><?= $esEdicion ? 'Actualizar' : 'Crear' ?></button>
    <a class="btn" href="?action=index">Volver</a>
  </p>
</form>