<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Órdenes Anuladas</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h2>Reporte de Órdenes Anuladas</h2>
<p><strong>Total Anulado:</strong> $<?= number_format($report['total_anulado'], 2) ?></p>

<h3>Órdenes Anuladas</h3>
<table border="1">
    <tr><th>ID</th><th>Fecha</th><th>Total</th></tr>
    <?php foreach ($report['orders'] as $o): ?>
        <tr>
            <td><?= $o['id'] ?></td>
            <td><?= $o['fecha'] ?></td>
            <td>$<?= number_format($o['total'], 2) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/Reporte/cancelled">Volver</a>

</body>
</html>
