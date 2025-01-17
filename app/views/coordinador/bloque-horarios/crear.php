<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Bloque de Horario</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <h1>Crear Nuevo Bloque de Horario</h1>
        <nav>
            <a href="/coordinador/bloques_horarios">Volver a la lista de Bloques de Horarios</a>
        </nav>
    </header>
    <main>
        <form action="/coordinador/bloques_horarios/guardar" method="POST">
            <div>
                <label for="hora_inicio">Hora de Inicio:</label>
                <input type="time" id="hora_inicio" name="hora_inicio" required>
            </div>
            <div>
                <label for="hora_fin">Hora de Fin:</label>
                <input type="time" id="hora_fin" name="hora_fin" required>
            </div>
            <div>
                <label for="dia_semana">Día de la Semana:</label>
                <select id="dia_semana" name="dia_semana" required>
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                    <option value="Sábado">Sábado</option>
                    <option value="Domingo">Domingo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Bloque de Horario</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

