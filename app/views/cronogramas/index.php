<?php require_once '../app/views/shared/header.php'; ?>
<h1>Lista de Horarios</h1>
<table>
    <tr>
        <th>Materia</th>
        <th>Aula</th>
        <th>Día</th>
        <th>Hora</th>
    </tr>
    <?php foreach ($cronogramas as $cronograma): ?>
    <tr>
        <td><?= htmlspecialchars($cronograma['subject']); ?></td>
        <td><?= htmlspecialchars($cronograma['room']); ?></td>
        <td><?= htmlspecialchars($cronograma['day']); ?></td>
        <td><?= htmlspecialchars($cronograma['time']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require_once '../app/views/shared/footer.php'; ?>