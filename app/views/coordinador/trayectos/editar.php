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
    <title>Editar Trayecto</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Editar Trayecto</h1>
        <nav>
            <a href="<?= base_url('coordinador/trayectos') ?>">Volver a la lista de Trayectos</a>
        </nav>
    </header>
    <main>
        <form action="<?= base_url('coordinador/trayectos/actualizar/' . $trayecto['id']) ?>" method="POST">
            <div>
                <label for="codigo">Código del Trayecto:</label>
                <input type="text" id="codigo" name="codigo" value="<?= $trayecto['codigo'] ?>" required>
            </div>
            <div>
                <label for="periodo">Periodo:</label>
                <input type="text" id="periodo" name="periodo" value="<?= $trayecto['periodo'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Trayecto</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

