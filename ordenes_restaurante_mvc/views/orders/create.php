<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Orden</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h2>Registrar Orden</h2>
<form method="post" action="/Order/store">
    Fecha: <input type="date" name="fecha" required><br><br>
    Mesa: 
    <select name="mesa_id" required>
        <?php foreach ($mesas as $mesa): ?>
            <option value="<?= $mesa['id'] ?>"><?= $mesa['nombre'] ?></option>
        <?php endforeach; ?>
    </select><br><br>
    <h3>Platos</h3>
    <div id="platos">
        <select name="plato[]" class="plato">
            <?php foreach ($platos as $plato): ?>
                <option value="<?= $plato['id'] ?>" data-precio="<?= $plato['precio'] ?>"><?= $plato['descripcion'] ?></option>
            <?php endforeach; ?>
        </select>
        Cantidad: <input type="number" name="cantidad[]" value="1" min="1"><br><br>
    </div>
    <button type="button" onclick="agregarPlato()">Agregar Plato</button><br><br>
    <input type="hidden" name="detalle" id="detalle">
    <button type="submit">Guardar Orden</button>
</form>

<script>
    function agregarPlato() {
        var platos = document.getElementById('platos');
        var nuevoPlato = platos.firstElementChild.cloneNode(true);
        var cantidad = nuevoPlato.querySelector('input');
        cantidad.value = 1;
        platos.appendChild(nuevoPlato);
    }

    document.querySelector('form').addEventListener('submit', function() {
        var detalle = [];
        var platos = document.querySelectorAll('.plato');
        var cantidades = document.querySelectorAll('[name="cantidad[]"]');
        
        platos.forEach(function(plato, index) {
            var precio = plato.options[plato.selectedIndex].dataset.precio;
            detalle.push({
                dish_id: plato.value,
                cantidad: cantidades[index].value,
                precio_unitario: precio
            });
        });

        document.getElementById('detalle').value = JSON.stringify(detalle);
    });
</script>

</body>
</html>
