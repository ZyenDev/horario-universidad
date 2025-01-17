<?php 
require_once __DIR__ . '/../../helpers/url_helper.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control del Coordinador</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Panel de Control del Coordinador</h1>
        <nav>
            <a href="<?= base_url('logout') ?>" class="btn btn-secondary">Cerrar Sesión</a>
        </nav>
    </header>
    <main class="container">
        <section class="module-grid">
            <div class="module-card">
                <h2>Gestión de Alumnos</h2>
                <a href="<?= base_url('coordinador/alumnos') ?>" class="btn btn-primary">Acceder</a>
            </div>
            <div class="module-card">
                <h2>Gestión de Profesores</h2>
                <a href="<?= base_url('coordinador/profesores') ?>" class="btn btn-primary">Acceder</a>
            </div>
            <div class="module-card">
                <h2>Gestión de Materias</h2>
                <a href="<?= base_url('coordinador/materias') ?>" class="btn btn-primary">Acceder</a>
            </div>
            <div class="module-card">
                <h2>Gestión de Aulas</h2>
                <a href="<?= base_url('coordinador/aulas') ?>" class="btn btn-primary">Acceder</a>
            </div>
            <div class="module-card">
                <h2>Gestión de Tipos de Aula</h2>
                <a href="<?= base_url('coordinador/tipos_aula') ?>" class="btn btn-primary">Acceder</a>
            </div>
            <div class="module-card">
                <h2>Gestión de Trayectos</h2>
                <a href="<?= base_url('coordinador/trayectos') ?>" class="btn btn-primary">Acceder</a>
            </div>
            <div class="module-card">
                <h2>Gestión de Usuarios</h2>
                <a href="<?= base_url('coordinador/usuarios') ?>" class="btn btn-primary">Acceder</a>
            </div>
            <div class="module-card">
                <h2>Gestión de Roles</h2>
                <a href="<?= base_url('coordinador/roles') ?>" class="btn btn-primary">Acceder</a>
            </div>
            <div class="module-card">
                <h2>Gestión de Personas</h2>
                <a href="<?= base_url('coordinador/personas') ?>" class="btn btn-primary">Acceder</a>
            </div>
            <div class="module-card">
                <h2>Gestión de Bloques Horarios</h2>
                <a href="<?= base_url('coordinador/bloques_horarios') ?>" class="btn btn-primary">Acceder</a>
            </div>
            <div class="module-card">
                <h2>Gestión de Preguntas de Seguridad</h2>
                <a href="<?= base_url('coordinador/pregunta_seguridad') ?>" class="btn btn-primary">Acceder</a>
            </div>
            <div class="module-card">
                <h2>Gestión de Tipos de Pregunta de Seguridad</h2>
                <a href="<?= base_url('coordinador/tipos_pregunta_seguridad') ?>" class="btn btn-primary">Acceder</a>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Gestión Académica</p>
    </footer>

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .module-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .module-card {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 20px;
            text-align: center;
        }
        .module-card h2 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 1.2em;
        }
    </style>
</body>
</html>

