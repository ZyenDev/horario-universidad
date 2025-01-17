<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Profesor</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <h1>Crear Nuevo Profesor</h1>
        <nav>
            <a href="/coordinador/profesores">Volver a la lista de Profesores</a>
        </nav>
    </header>
    <main>
        <form action="/coordinador/profesores/guardar" method="POST">
            <div>
                <label for="primer_nombre">Primer Nombre:</label>
                <input type="text" id="primer_nombre" name="primer_nombre" required>
            </div>
            <div>
                <label for="segundo_nombre">Segundo Nombre:</label>
                <input type="text" id="segundo_nombre" name="segundo_nombre">
            </div>
            <div>
                <label for="primer_apellido">Primer Apellido:</label>
                <input type="text" id="primer_apellido" name="primer_apellido" required>
            </div>
            <div>
                <label for="segundo_apellido">Segundo Apellido:</label>
                <input type="text" id="segundo_apellido" name="segundo_apellido">
            </div>
            <div>
                <label for="cedula">Cédula:</label>
                <input type="text" id="cedula" name="cedula" required>
            </div>
            <div>
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Profesor</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

