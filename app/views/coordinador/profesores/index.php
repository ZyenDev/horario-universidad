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
    <title>Gestión de Profesores</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Gestión de Profesores</h1>
        <nav>
            <a href="<?= base_url('coordinador') ?>">Volver al Panel</a>
        </nav>
    </header>
    <main>
        <a href="<?= base_url('coordinador/profesores/crear') ?>" class="btn btn-primary">Crear Nuevo Profesor</a>
        <?php if (empty($profesores)): ?>
            <p>No hay profesores registrados en el sistema.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($profesores as $profesor): ?>
                    <tr>
                        <td><?= $profesor['id'] ?></td>
                        <td><?= $profesor['nombre'] ?></td>
                        <td><?= $profesor['apellido'] ?></td>
                        <td><?= $profesor['cedula'] ?></td>
                        <td>
                            <a href="<?= base_url('coordinador/profesores/editar/' . $profesor['id']) ?>" class="btn btn-secondary">Editar</a>
                            <form action="<?= base_url('coordinador/profesores/eliminar/' . $profesor['id']) ?>" method="POST" style="display:inline;">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este profesor?')">Eliminar</button>
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

