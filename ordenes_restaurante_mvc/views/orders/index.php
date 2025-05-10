<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Órdenes</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h2>Órdenes</h2>
<table border="1">
    <tr><th>ID</th><th>Fecha</th><th>Mesa</th><th>Total</th><th>Anulada</th><th>Acciones</th></tr>
    <?php foreach ($ordenes as $orden): ?>
        <tr>
            <td><?= $orden['id'] ?></td>
            <td><?= $orden['fecha'] ?></td>
            <td><?= $orden['mesa'] ?></td>
            <td>$<?= number_format($orden['total'], 2) ?></td>
            <td><?= $orden['anulada'] ? 'Sí' : 'No' ?></td>
            <td>
                <a href="/Order/details?id=<?= $orden['id'] ?>">Ver Detalle</a> |
                <?php if (!$orden['anulada']): ?>
                    <a href="/Order/cancel?id=<?= $orden['id'] ?>" onclick="return confirm('¿Anular orden?')">Anular</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
