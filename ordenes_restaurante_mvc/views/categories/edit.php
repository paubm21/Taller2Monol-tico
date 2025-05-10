<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h2>Editar Categoría</h2>
<form method="post" action="/Category/update">
    <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
    Nombre: <input type="text" name="nombre" value="<?= $categoria['nombre'] ?>" required><br><br>
    <button type="submit">Actualizar</button>
</form>

<a href="/Category/index">Volver</a>

</body>
</html>
