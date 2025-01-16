<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Bloque de Horario</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <h1>Editar Bloque de Horario</h1>
        <nav>
            <a href="/coordinador/bloques_horarios">Volver a la lista de Bloques de Horarios</a>
        </nav>
    </header>
    <main>
        <form action="/coordinador/bloques_horarios/actualizar/<?= $bloque['id'] ?>" method="POST">
            <div>
                <label for="hora_inicio">Hora de Inicio:</label>
                <input type="time" id="hora_inicio" name="hora_inicio" value="<?= $bloque['hora_inicio'] ?>" required>
            </div>
            <div>
                <label for="hora_fin">Hora de Fin:</label>
                <input type="time" id="hora_fin" name="hora_fin" value="<?= $bloque['hora_fin'] ?>" required>
            </div>
            <div>
                <label for="dia_semana">Día de la Semana:</label>
                <select id="dia_semana" name="dia_semana" required>
                    <option value="Lunes" <?= $bloque['dia_semana'] == 'Lunes' ? 'selected' : '' ?>>Lunes</option>
                    <option value="Martes" <?= $bloque['dia_semana'] == 'Martes' ? 'selected' : '' ?>>Martes</option>
                    <option value="Miércoles" <?= $bloque['dia_semana'] == 'Miércoles' ? 'selected' : '' ?>>Miércoles</option>
                    <option value="Jueves" <?= $bloque['dia_semana'] == 'Jueves' ? 'selected' : '' ?>>Jueves</option>
                    <option value="Viernes" <?= $bloque['dia_semana'] == 'Viernes' ? 'selected' : '' ?>>Viernes</option>
                    <option value="Sábado" <?= $bloque['dia_semana'] == 'Sábado' ? 'selected' : '' ?>>Sábado</option>
                    <option value="Domingo" <?= $bloque['dia_semana'] == 'Domingo' ? 'selected' : '' ?>>Domingo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Bloque de Horario</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

