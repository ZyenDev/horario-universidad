<?php require_once 'helpers/url_helper.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tipos de Pregunta de Seguridad</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Gestión de Tipos de Pregunta de Seguridad</h1>
        <nav>
            <a href="<?= base_url('coordinador/dashboard') ?>">Volver al Panel</a>
        </nav>
    </header>
    <main>
        <a href="<?= base_url('coordinador/tipos_pregunta_seguridad/crear') ?>" class="btn btn-primary">Crear Nuevo Tipo de Pregunta de Seguridad</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tipos_pregunta_seguridad as $tipo): ?>
                <tr>
                    <td><?= $tipo['id'] ?></td>
                    <td><?= $tipo['nombre'] ?></td>
                    <td>
                        <a href="<?= base_url('coordinador/tipos_pregunta_seguridad/editar/' . $tipo['id']) ?>" class="btn btn-secondary">Editar</a>
                        <form action="<?= base_url('coordinador/tipos_pregunta_seguridad/eliminar/' . $tipo['id']) ?>" method="POST" style="display:inline;">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este tipo de pregunta de seguridad?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

