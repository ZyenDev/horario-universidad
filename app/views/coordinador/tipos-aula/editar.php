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
    <title>Editar Tipo de Aula</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Editar Tipo de Aula</h1>
        <nav>
            <a href="<?= base_url('coordinador/tipos_aula') ?>">Volver a la lista de Tipos de Aula</a>
        </nav>
    </header>
    <main>
        <form action="<?= base_url('coordinador/tipos_aula/actualizar/' . $tipoAula['id']) ?>" method="POST">
            <div>
                <label for="nombre">Nombre del Tipo de Aula:</label>
                <input type="text" id="nombre" name="nombre" value="<?= $tipoAula['nombre'] ?>" required>
            </div>
            <div>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4"><?= $tipoAula['descripcion'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Tipo de Aula</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

