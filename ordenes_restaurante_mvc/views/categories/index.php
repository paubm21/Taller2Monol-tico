<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Categorías</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h2>Listado de Categorías</h2>
<a href="/Category/create">Nueva Categoría</a>
<table border="1">
    <tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr>
    <?php foreach ($categorias as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['nombre'] ?></td>
            <td>
                <a href="/Category/edit?id=<?= $c['id'] ?>">Editar</a> |
                <a href="/Category/delete?id=<?= $c['id'] ?>" onclick="return confirm('¿Eliminar categoría?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
