<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platos</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h2>Platos</h2>
<a href="/Plato/create">Agregar nuevo plato</a>
<table border="1">
    <tr>
        <th>ID</th><th>Descripción</th><th>Categoría</th><th>Precio</th><th>Acciones</th>
    </tr>
    <?php foreach ($platos as $plato): ?>
        <tr>
            <td><?= $plato['id'] ?></td>
            <td><?= $plato['descripcion'] ?></td>
            <td><?= $plato['categoria'] ?></td>
            <td><?= number_format($plato['precio'], 2) ?></td>
            <td>
                <a href="/Plato/edit?id=<?= $plato['id'] ?>">Editar</a>
                <a href="/Plato/delete?id=<?= $plato['id'] ?>" onclick="return confirm('¿Eliminar este plato?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
