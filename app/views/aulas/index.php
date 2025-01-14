<?php require_once '../app/views/shared/header.php'; ?>
<h1>Lista de Salones</h1>
<a href="/salones/crear">Crear un nuevo salón</a>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Capacidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($salones as $salon): ?>
            <tr>
                <td><?php echo $salon['name']; ?></td>
                <td><?php echo $salon['capacidad']; ?></td>
                <td>
                    <a href="/salones/editar/<?php echo $salon['id']; ?>">Editar</a>
                    <a href="/salones/eliminar/<?php echo $salon['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este salón?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once '../app/views/shared/footer.php'; ?>