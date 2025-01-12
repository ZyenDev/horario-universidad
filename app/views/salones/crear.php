<h1>Crear un Nuevo Salón</h1>
<form action="/salones/guardar" method="POST">
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" required>

    <label for="capacidad">Capacidad:</label>
    <input type="number" name="capacidad" id="capacidad" required>

    <button type="submit">Crear Salón</button>
</form>