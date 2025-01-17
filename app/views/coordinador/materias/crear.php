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
    <title>Crear Nueva Materia</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Crear Nueva Materia</h1>
        <nav>
            <a href="<?= base_url('coordinador/materias') ?>">Volver a la lista de Materias</a>
        </nav>
    </header>
    <main>
        <form action="<?= base_url('coordinador/materias/guardar') ?>" method="POST">
            <div>
                <label for="nombre">Nombre de la Materia:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Materia</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

