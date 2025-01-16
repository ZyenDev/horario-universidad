<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Bloques de Horarios</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <h1>Gestión de Bloques de Horarios</h1>
        <nav>
            <a href="/coordinador/dashboard">Volver al Panel</a>
        </nav>
    </header>
    <main>
        <a href="/coordinador/bloques_horarios/crear" class="btn btn-primary">Crear Nuevo Bloque de Horario</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hora de Inicio</th>
                    <th>Hora de Fin</th>
                    <th>Día de la Semana</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bloques_horarios as $bloque): ?>
                <tr>
                    <td><?= $bloque['id'] ?></td>
                    <td><?= $bloque['hora_inicio'] ?></td>
                    <td><?= $bloque['hora_fin'] ?></td>
                    <td><?= $bloque['dia_semana'] ?></td>
                    <td>
                        <a href="/coordinador/bloques_horarios/editar/<?= $bloque['id'] ?>" class="btn btn-secondary">Editar</a>
                        <form action="/coordinador/bloques_horarios/eliminar/<?= $bloque['id'] ?>" method="POST" style="display:inline;">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este bloque de horario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>
</body>
</html>

