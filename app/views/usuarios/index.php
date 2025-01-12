<?php require_once '../app/views/shared/header.php'; ?>
<h1>Usuarios</h1>
<a href="/usuarios/crear">Agregar Usuario</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario['id']; ?></td>
            <td><?= htmlspecialchars($usuario['name']); ?></td>
            <td><?= htmlspecialchars($usuario['email']); ?></td>
            <td><?= htmlspecialchars($usuario['role']); ?></td>
            <td>
                <a href="/usuarios/editar?id=<?= $usuario['id']; ?>">Editar</a>
                <a href="/usuarios/eliminar?id=<?= $usuario['id']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require_once '../app/views/shared/footer.php'; ?>