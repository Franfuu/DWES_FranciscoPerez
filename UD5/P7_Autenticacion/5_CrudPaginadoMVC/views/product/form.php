<?php require __DIR__ . '/../layout/header.php'; ?>

<h1><?= $action === 'store' ? 'Nuevo producto' : 'Editar producto' ?></h1>

<?php if (!empty($error)): ?>
    <div class="alert alert-error">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>

<form method="post" action="index.php?c=product&a=<?= htmlspecialchars($action) ?>" class="form">
    <?php if (!empty($product['id'])): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
    <?php endif; ?>

    <label>
        Nombre
        <input type="text" name="name" value="<?= htmlspecialchars((string)$product['name']) ?>" required>
    </label>

    <label>
        Precio (€)
        <input type="number" step="0.01" min="0" name="price" value="<?= htmlspecialchars((string)$product['price']) ?>" required>
    </label>

    <button type="submit">
        <?= $action === 'store' ? 'Crear' : 'Actualizar' ?>
    </button>

    <a href="index.php?c=product&a=index" class="button button-secondary">Volver</a>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>