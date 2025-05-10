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
<form method="post" action="/Reporte/cancelled">
    Fecha de Inicio: <input type="date" name="start_date" required><br><br>
    Fecha de Fin: <input type="date" name="end_date" required><br><br>
    <button type="submit">Generar Reporte</button>
</form>

</body>
</html>

