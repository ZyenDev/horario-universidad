<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../../../helpers/url_helper.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Gestión de Usuarios</h1>
        <nav>
            <a href="<?= base_url('coordinador') ?>">Volver al Panel</a>
        </nav>
    </header>
    <main>
        <?php if (isset($_SESSION['flash'])): ?>
            <div class="alert alert-<?= $_SESSION['flash']['type'] ?>">
                <?= $_SESSION['flash']['message'] ?>
            </div>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>

        <a href="<?= base_url('coordinador/usuarios/crear') ?>" class="btn btn-primary">Crear Nuevo Usuario</a>
        <?php if (empty($usuarios)): ?>
            <p>No hay usuarios registrados en el sistema.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= $usuario['username'] ?></td>
                        <td><?= $usuario['rol'] ?></td>
                        <td>
                            <a href="<?= base_url('coordinador/usuarios/editar/' . $usuario['id']) ?>" class="btn btn-secondary">Editar</a>
                            <form action="<?= base_url('coordinador/usuarios/eliminar/' . $usuario['id']) ?>" method="POST" style="display:inline;">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>
