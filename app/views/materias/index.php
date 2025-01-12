<?php require_once '../app/views/shared/header.php'; ?>
<h1>Materias</h1>
<a href="/materias/crear">Crear Materia</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Profesor</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($materias as $materia): ?>
        <tr>
            <td><?= $subject['id']; ?></td>
            <td><?= htmlspecialchars($materia['name']); ?></td>
            <td><?= htmlspecialchars($materia['profesor']); ?></td>
            <td>
                <a href="/materias/editar?id=<?= $materia['id']; ?>">Editar</a>
                <a href="/materias/eliminar?id=<?= $materia['id']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require_once '../app/views/shared/footer.php'; ?>