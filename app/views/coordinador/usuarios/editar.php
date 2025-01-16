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
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Editar Usuario</h1>
        <nav>
            <a href="<?= base_url('coordinador/usuarios') ?>">Volver a la lista de Usuarios</a>
        </nav>
    </header>
    <main>
        <form action="<?= base_url('coordinador/usuarios/actualizar/' . $usuario['id']) ?>" method="POST">
            <div>
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" value="<?= $usuario['username'] ?>" required>
            </div>
            <div>
                <label for="password">Nueva Contraseña (dejar en blanco para no cambiar):</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <label for="rol">Rol:</label>
                <select id="rol" name="rol" required>
                    <?php foreach ($roles as $rol): ?>
                        <option value="<?= $rol ?>" <?= $rol === $usuario['rol'] ? 'selected' : '' ?>>
                            <?= ucfirst($rol) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

