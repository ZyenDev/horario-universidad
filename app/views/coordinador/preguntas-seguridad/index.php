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
    <title>Gestión de Preguntas de Seguridad</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Gestión de Preguntas de Seguridad</h1>
        <nav>
            <a href="<?= base_url('coordinador') ?>">Volver al Panel</a>
        </nav>
    </header>
    <main>
        <a href="<?= base_url('coordinador/preguntas_seguridad/crear') ?>" class="btn btn-primary">Crear Nueva Pregunta de Seguridad</a>
        <?php if (empty($preguntas_seguridad)): ?>
            <p>No hay preguntas de seguridad registradas en el sistema.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pregunta</th>
                        <th>Tipo de Pregunta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($preguntas_seguridad as $pregunta): ?>
                    <tr>
                        <td><?= $pregunta['id'] ?></td>
                        <td><?= $pregunta['pregunta'] ?></td>
                        <td><?= $pregunta['tipo_pregunta'] ?></td>
                        <td>
                            <a href="<?= base_url('coordinador/preguntas_seguridad/editar/' . $pregunta['id']) ?>" class="btn btn-secondary">Editar</a>
                            <form action="<?= base_url('coordinador/preguntas_seguridad/eliminar/' . $pregunta['id']) ?>" method="POST" style="display:inline;">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta pregunta de seguridad?')">Eliminar</button>
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

