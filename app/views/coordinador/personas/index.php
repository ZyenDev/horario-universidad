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
    <title>Gestión de Personas</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Gestión de Personas</h1>
        <nav>
            <a href="<?= base_url('coordinador') ?>">Volver al Panel</a>
        </nav>
    </header>
    <main>
        <a href="<?= base_url('coordinador/personas/crear') ?>" class="btn btn-primary">Crear Nueva Persona</a>
        <?php if (empty($personas)): ?>
            <p>No hay personas registradas en el sistema.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Primer Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Cédula</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($personas as $persona): ?>
                    <tr>
                        <td><?= $persona['id'] ?></td>
                        <td><?= $persona['primer_nombre'] ?></td>
                        <td><?= $persona['primer_apellido'] ?></td>
                        <td><?= $persona['cedula'] ?></td>
                        <td>
                            <a href="<?= base_url('coordinador/personas/editar/' . $persona['id']) ?>" class="btn btn-secondary">Editar</a>
                            <form action="<?= base_url('coordinador/personas/eliminar/' . $persona['id']) ?>" method="POST" style="display:inline;">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta persona?')">Eliminar</button>
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

