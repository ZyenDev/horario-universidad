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
    <title>Editar Persona</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Editar Persona</h1>
        <nav>
            <a href="<?= base_url('coordinador/personas') ?>">Volver a la lista de Personas</a>
        </nav>
    </header>
    <main>
        <form action="<?= base_url('coordinador/personas/actualizar/' . $persona['id']) ?>" method="POST">
            <div>
                <label for="primer_nombre">Primer Nombre:</label>
                <input type="text" id="primer_nombre" name="primer_nombre" value="<?= $persona['primer_nombre'] ?>" required>
            </div>
            <div>
                <label for="segundo_nombre">Segundo Nombre:</label>
                <input type="text" id="segundo_nombre" name="segundo_nombre" value="<?= $persona['segundo_nombre'] ?>">
            </div>
            <div>
                <label for="primer_apellido">Primer Apellido:</label>
                <input type="text" id="primer_apellido" name="primer_apellido" value="<?= $persona['primer_apellido'] ?>" required>
            </div>
            <div>
                <label for="segundo_apellido">Segundo Apellido:</label>
                <input type="text" id="segundo_apellido" name="segundo_apellido" value="<?= $persona['segundo_apellido'] ?>">
            </div>
            <div>
                <label for="cedula">Cédula:</label>
                <input type="text" id="cedula" name="cedula" value="<?= $persona['cedula'] ?>" required>
            </div>
            <div>
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" value="<?= $persona['correo'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Persona</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

