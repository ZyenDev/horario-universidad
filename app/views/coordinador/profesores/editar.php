<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <h1>Editar Profesor</h1>
        <nav>
            <a href="/coordinador/profesores">Volver a la lista de Profesores</a>
        </nav>
    </header>
    <main>
        <form action="/coordinador/profesores/actualizar/<?= $profesor['id'] ?>" method="POST">
            <div>
                <label for="primer_nombre">Primer Nombre:</label>
                <input type="text" id="primer_nombre" name="primer_nombre" value="<?= $profesor['primer_nombre'] ?>" required>
            </div>
            <div>
                <label for="segundo_nombre">Segundo Nombre:</label>
                <input type="text" id="segundo_nombre" name="segundo_nombre" value="<?= $profesor['segundo_nombre'] ?>">
            </div>
            <div>
                <label for="primer_apellido">Primer Apellido:</label>
                <input type="text" id="primer_apellido" name="primer_apellido" value="<?= $profesor['primer_apellido'] ?>" required>
            </div>
            <div>
                <label for="segundo_apellido">Segundo Apellido:</label>
                <input type="text" id="segundo_apellido" name="segundo_apellido" value="<?= $profesor['segundo_apellido'] ?>">
            </div>
            <div>
                <label for="cedula">Cédula:</label>
                <input type="text" id="cedula" name="cedula" value="<?= $profesor['cedula'] ?>" required>
            </div>
            <div>
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" value="<?= $profesor['correo'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Profesor</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

