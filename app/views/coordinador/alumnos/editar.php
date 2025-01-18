<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <h1>Editar Alumno</h1>
        <nav>
            <a href="/coordinador/alumnos">Volver a la lista de Alumnos</a>
        </nav>
    </header>
    <main>
        <form action="/coordinador/alumnos/actualizar/<?= $alumno['id'] ?>" method="POST">
            <div>
                <label for="primer_nombre">Primer Nombre:</label>
                <input type="text" id="primer_nombre" name="primer_nombre" value="<?= $alumno['primer_nombre'] ?>" required>
            </div>
            <div>
                <label for="segundo_nombre">Segundo Nombre:</label>
                <input type="text" id="segundo_nombre" name="segundo_nombre" value="<?= $alumno['segundo_nombre'] ?>">
            </div>
            <div>
                <label for="primer_apellido">Primer Apellido:</label>
                <input type="text" id="primer_apellido" name="primer_apellido" value="<?= $alumno['primer_apellido'] ?>" required>
            </div>
            <div>
                <label for="segundo_apellido">Segundo Apellido:</label>
                <input type="text" id="segundo_apellido" name="segundo_apellido" value="<?= $alumno['segundo_apellido'] ?>">
            </div>
            <div>
                <label for="cedula">Cédula:</label>
                <input type="text" id="cedula" name="cedula" value="<?= $alumno['cedula'] ?>" required>
            </div>
            <div>
                <label for="fk_trayecto">Trayecto:</label>
                <select id="fk_trayecto" name="fk_trayecto" required>
                    <?php foreach ($trayectos as $trayecto): ?>
                        <option value="<?= $trayecto['id'] ?>" <?= $trayecto['id'] == $alumno['fk_trayecto'] ? 'selected' : '' ?>>
                            <?= $trayecto['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Alumno</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

