<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Categoría</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h2>Registrar Nueva Categoría</h2>
<form method="post" action="/Category/store">
    Nombre: <input type="text" name="nombre" required><br><br>
    <button type="submit">Guardar</button>
</form>

<a href="/Category/index">Volver</a>

</body>
</html>
