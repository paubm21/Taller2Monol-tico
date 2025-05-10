<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Plato</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h2>Editar Plato</h2>
<form method="post" action="/Plato/update">
    <input type="hidden" name="id" value="<?= $plato['id'] ?>">
    Descripción: <input type="text" name="descripcion" value="<?= $plato['descripcion'] ?>" required><br><br>
    Precio: <input type="number" step="0.01" name="precio" value="<?= $plato['precio'] ?>" required><br><br>
    <button type="submit">Actualizar</button>
</form>

<a href="/Plato/index">Volver</a>

</body>
</html>
