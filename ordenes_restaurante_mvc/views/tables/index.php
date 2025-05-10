<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Mesas</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h2>Listado de Mesas</h2>
<a href="/Table/create">Nueva Mesa</a>
<table border="1">
    <tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr>
    <?php foreach ($mesas as $m): ?>
        <tr>
            <td><?= $m['id'] ?></td>
            <td><?= $m['nombre'] ?></td>
            <td>
                <a href="/Table/edit?id=<?= $m['id'] ?>">Editar</a> |
                <a href="/Table/delete?id=<?= $m['id'] ?>" onclick="return confirm('¿Eliminar mesa?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

