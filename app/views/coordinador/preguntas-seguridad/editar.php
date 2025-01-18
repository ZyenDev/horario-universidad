<?php require_once 'helpers/url_helper.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pregunta de Seguridad</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Editar Pregunta de Seguridad</h1>
        <nav>
            <a href="<?= base_url('coordinador/preguntas_seguridad') ?>">Volver a la lista de Preguntas de Seguridad</a>
        </nav>
    </header>
    <main>
        <form action="<?= base_url('coordinador/preguntas_seguridad/actualizar/' . $pregunta['id']) ?>" method="POST">
            <div>
                <label for="pregunta">Pregunta:</label>
                <input type="text" id="pregunta" name="pregunta" value="<?= $pregunta['pregunta'] ?>" required>
            </div>
            <div>
                <label for="fk_tipo_pregunta">Tipo de Pregunta:</label>
                <select id="fk_tipo_pregunta" name="fk_tipo_pregunta" required>
                    <?php foreach ($tipos_pregunta as $tipo): ?>
                        <option value="<?= $tipo['id'] ?>" <?= $tipo['id'] == $pregunta['fk_tipo_pregunta'] ? 'selected' : '' ?>>
                            <?= $tipo['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Pregunta de Seguridad</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

