<?php require_once '../app/views/shared/header.php'; ?>
<h1>Crear Materia</h1>
<form action="/materias/store" method="POST">
    <label for="name">Nombre de la Materia:</label>
    <input type="text" name="name" id="name" required>

    <label for="profesor_id">Profesor Asignado:</label>
    <select name="profesor_id" id="profesor_id" required>
        <?php foreach ($profesores as $profesor): ?>
            <option value="<?= $profesor['id']; ?>"><?= htmlspecialchars($profesor['name']); ?></option>
        <?php endforeach; ?>
    </select>

    <label for="estudiantes">Estudiantes Inscritos:</label>
    <select name="estudiantes[]" id="estudiantes" multiple>
        <?php foreach ($estudiantes as $estudiante): ?>
            <option value="<?= $estudiante['id']; ?>"><?= htmlspecialchars($estudiante['name']); ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Guardar</button>
</form>
<?php require_once '../app/views/shared/footer.php'; ?>