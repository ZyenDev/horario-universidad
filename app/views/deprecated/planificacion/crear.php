<?php require_once '../app/views/shared/header.php'; ?>
<h1>Crear Planificación</h1>
<form action="/planificacion/exportar" method="POST">
    <label for="materia_id">Materia:</label>
    <select name="materia_id" id="materia_id" required>
        <?php foreach ($materias as $materia): ?>
            <option value="<?= $materia['id']; ?>"><?= htmlspecialchars($materia['name']); ?></option>
        <?php endforeach; ?>
    </select>

    <label for="salon_id">Salon:</label>
    <select name="salon_id" id="salon_id" required>
        <?php foreach ($salones as $salon): ?>
            <option value="<?= $salon['id']; ?>"><?= htmlspecialchars($salon['name']); ?></option>
        <?php endforeach; ?>
    </select>

    <label for="day">Día:</label>
    <select name="day" id="day" required>
        <option value="Lunes">Lunes</option>
        <option value="Martes">Martes</option>
        <option value="Miércoles">Miércoles</option>
        <option value="Jueves">Jueves</option>
        <option value="Viernes">Viernes</option>
    </select>

    <label for="time_start">Hora de Inicio:</label>
    <input type="time" name="time_start" id="time_start" required>

    <label for="time_end">Hora de Fin:</label>
    <input type="time" name="time_end" id="time_end" required>

    <button type="submit">Guardar</button>
</form>
<?php require_once '../app/views/shared/footer.php'; ?>