<?php require_once 'helpers/url_helper.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Tipo de Pregunta de Seguridad</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Crear Nuevo Tipo de Pregunta de Seguridad</h1>
        <nav>
            <a href="<?= base_url('coordinador/tipos_pregunta_seguridad') ?>">Volver a la lista de Tipos de Pregunta de Seguridad</a>
        </nav>
    </header>
    <main>
        <form action="<?= base_url('coordinador/tipos_pregunta_seguridad/guardar') ?>" method="POST">
            <div>
                <label for="nombre">Nombre del Tipo de Pregunta de Seguridad:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Tipo de Pregunta de Seguridad</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

