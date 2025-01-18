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
    <title>Gestión de Tipos de Aula</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Gestión de Tipos de Aula</h1>
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

        <a href="<?= base_url('coordinador/tipos_aula/crear') ?>" class="btn btn-primary">Crear Nuevo Tipo de Aula</a>
        <?php if (empty($tiposAula)): ?>
            <p>No hay tipos de aula registrados en el sistema.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tiposAula as $tipoAula): ?>
                    <tr>
                        <td><?= $tipoAula['id'] ?></td>
                        <td><?= $tipoAula['nombre'] ?></td>
                        <td><?= $tipoAula['descripcion'] ?></td>
                        <td>
                            <a href="<?= base_url('coordinador/tipos_aula/editar/' . $tipoAula['id']) ?>" class="btn btn-secondary">Editar</a>
                            <form action="<?= base_url('coordinador/tipos_aula/eliminar/' . $tipoAula['id']) ?>" method="POST" style="display:inline;">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este tipo de aula?')">Eliminar</button>
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
