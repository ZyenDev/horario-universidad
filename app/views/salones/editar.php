<h1>Editar Salón</h1>
<form action="/salones/actualizar/<?php echo $salon['id']; ?>" method="POST">
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" value="<?php echo $salon['name']; ?>" required>

    <label for="capacity">Capacidad:</label>
    <input type="number" name="capacity" id="capacity" value="<?php echo $salon['capacity']; ?>" required>

    <button type="submit">Actualizar Salón</button>
</form>