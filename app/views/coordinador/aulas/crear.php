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
    <title>Crear Nueva Aula</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Crear Nueva Aula</h1>
        <nav>
            <a href="<?= base_url('coordinador/aulas') ?>">Volver a la lista de Aulas</a>
        </nav>
    </header>
    <main>
        <form action="<?= base_url('coordinador/aulas/guardar') ?>" method="POST">
            <div>
                <label for="codigo">Código del Aula:</label>
                <input type="text" id="codigo" name="codigo" required>
            </div>
            <div>
                <label for="tipo_aula_id">Tipo de Aula:</label>
                <select id="tipo_aula_id" name="tipo_aula_id" required>
                    <option value="">Seleccione un tipo de aula</option>
                    <?php foreach ($tiposAula as $tipoAula): ?>
                        <option value="<?= $tipoAula['id'] ?>"><?= $tipoAula['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Aula</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

