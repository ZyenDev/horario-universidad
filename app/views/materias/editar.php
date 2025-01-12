<h1>Editar Materia</h1>
<form action="/materias/actualizar/<?php echo $materia['id']; ?>" method="POST">
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" value="<?php echo $materia['name']; ?>" required>

    <label for="profesor_id">Profesor Asignado:</label>
    <select name="profesor_id" id="profesor_id" required>
            <option value="<?= $profesor['id']; ?>"><?= htmlspecialchars($profesor['name']); ?></option>
    </select>

    <button type="submit">Actualizar Materia</button>
</form>