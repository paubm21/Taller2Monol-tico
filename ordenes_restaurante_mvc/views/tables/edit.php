<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mesa</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h2>Editar Mesa</h2>
<form method="post" action="/Table/update">
    <input type="hidden" name="id" value="<?= $mesa['id'] ?>">
    Nombre: <input type="text" name="nombre" value="<?= $mesa['nombre'] ?>" required><br><br>
    <button type="submit">Actualizar</button>
</form>

<a href="/Table/index">Volver</a>

</body>
</html>
