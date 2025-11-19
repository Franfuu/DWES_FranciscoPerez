<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Listado de productos</h1>

<p>
    <a href="index.php?c=product&a=create" class="button">Nuevo producto</a>
</p>

<?php if (empty($products)): ?>
    <p>No hay productos todavía.</p>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio (€)</th>
                <th>Creado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['id']) ?></td>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td><?= number_format((float)$p['price'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($p['created_at']) ?></td>
                    <td>
                        <a href="index.php?c=product&a=edit&id=<?= urlencode($p['id']) ?>">Editar</a>
                        <a href="index.php?c=product&a=delete&id=<?= urlencode($p['id']) ?>"
                            onclick="return confirm('¿Seguro que quieres eliminar este producto?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../layout/footer.php'; ?>