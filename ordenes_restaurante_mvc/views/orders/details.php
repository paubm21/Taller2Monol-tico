<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Orden</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h2>Detalle de la Orden</h2>
<p><strong>Fecha:</strong> <?= $orden['fecha'] ?></p>
<p><strong>Mesa:</strong> <?= $orden['mesa'] ?></p>
<p><strong>Total:</strong> $<?= number_format($orden['total'], 2) ?></p>
<p><strong>Anulada:</strong> <?= $orden['anulada'] ? 'Sí' : 'No' ?></p>

<h3>Platos Solicitados</h3>
<table border="1">
    <tr><th>Plato</th><th>Cantidad</th><th>Precio Unitario</th></tr>
    <?php foreach ($detalles as $detalle): ?>
        <tr>
            <td><?= $detalle['descripcion'] ?></td>
            <td><?= $detalle['cantidad'] ?></td>
            <td>$<?= number_format($detalle['precio_unitario'], 2) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/Order/index">Volver</a>

</body>
</html>
