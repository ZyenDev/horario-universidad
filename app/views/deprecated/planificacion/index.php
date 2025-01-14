<?php require_once '../app/views/shared/header.php'; ?>
<h1>Planificación</h1>
<table>
    <tr>
        <th>Materia</th>
        <th>Salon</th>
        <th>Día</th>
        <th>Hora de Inicio</th>
        <th>Hora de Fin</th>
    </tr>
    <?php foreach ($planificacion as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['materia']); ?></td>
            <td><?= htmlspecialchars($item['salon']); ?></td>
            <td><?= htmlspecialchars($item['day']); ?></td>
            <td><?= htmlspecialchars($item['time_start']); ?></td>
            <td><?= htmlspecialchars($item['time_end']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="/planificacion/exportar">Exportar a CSV</a>
<?php require_once '../app/views/shared/footer.php'; ?>