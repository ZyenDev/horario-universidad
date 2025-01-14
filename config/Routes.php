<?php

return [
    // Auth routes
    '/' => ['controller' => 'AuthController', 'action' => 'index'],
    'login' => ['controller' => 'AuthController', 'action' => 'login'],
    'logout' => ['controller' => 'AuthController', 'action' => 'logout'],

    // Usuario routes
    'usuarios' => [
        'index' => ['controller' => 'UsuarioController', 'action' => 'index'],
        'crear' => ['controller' => 'UsuarioController', 'action' => 'create'],
        'guardar' => ['controller' => 'UsuarioController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'UsuarioController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'UsuarioController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'UsuarioController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // Materia routes
    'materias' => [
        'index' => ['controller' => 'MateriaController', 'action' => 'index'],
        'crear' => ['controller' => 'MateriaController', 'action' => 'create'],
        'guardar' => ['controller' => 'MateriaController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'MateriaController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'MateriaController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'MateriaController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // Profesor routes
    'profesores' => [
        'index' => ['controller' => 'ProfesorController', 'action' => 'index'],
        'crear' => ['controller' => 'ProfesorController', 'action' => 'create'],
        'guardar' => ['controller' => 'ProfesorController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'ProfesorController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'ProfesorController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'ProfesorController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // BloqueHorario routes
    'bloque_horario' => [
        'index' => ['controller' => 'BloqueHorarioController', 'action' => 'index'],
        'crear' => ['controller' => 'BloqueHorarioController', 'action' => 'create'],
        'guardar' => ['controller' => 'BloqueHorarioController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'BloqueHorarioController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'BloqueHorarioController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'BloqueHorarioController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // Persona routes
    'personas' => [
        'index' => ['controller' => 'PersonaController', 'action' => 'index'],
        'crear' => ['controller' => 'PersonaController', 'action' => 'create'],
        'guardar' => ['controller' => 'PersonaController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'PersonaController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'PersonaController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'PersonaController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // Aula routes
    'aulas' => [
        'index' => ['controller' => 'AulaController', 'action' => 'index'],
        'crear' => ['controller' => 'AulaController', 'action' => 'create'],
        'guardar' => ['controller' => 'AulaController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'AulaController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'AulaController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'AulaController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // Alumno routes
    'alumnos' => [
        'index' => ['controller' => 'AlumnoController', 'action' => 'index'],
        'crear' => ['controller' => 'AlumnoController', 'action' => 'create'],
        'guardar' => ['controller' => 'AlumnoController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'AlumnoController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'AlumnoController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'AlumnoController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // PreguntaSeguridad routes
    'pregunta_seguridad' => [
        'index' => ['controller' => 'PreguntaSeguridadController', 'action' => 'index'],
        'crear' => ['controller' => 'PreguntaSeguridadController', 'action' => 'create'],
        'guardar' => ['controller' => 'PreguntaSeguridadController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'PreguntaSeguridadController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'PreguntaSeguridadController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'PreguntaSeguridadController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // Coordinador routes
    'coordinadores' => [
        'index' => ['controller' => 'CoordinadorController', 'action' => 'index'],
        'crear' => ['controller' => 'CoordinadorController', 'action' => 'create'],
        'guardar' => ['controller' => 'CoordinadorController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'CoordinadorController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'CoordinadorController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'CoordinadorController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // Rol routes
    'roles' => [
        'index' => ['controller' => 'RolController', 'action' => 'index'],
        'crear' => ['controller' => 'RolController', 'action' => 'create'],
        'guardar' => ['controller' => 'RolController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'RolController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'RolController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'RolController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // TipoAula routes
    'tipo_aula' => [
        'index' => ['controller' => 'TipoAulaController', 'action' => 'index'],
        'crear' => ['controller' => 'TipoAulaController', 'action' => 'create'],
        'guardar' => ['controller' => 'TipoAulaController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'TipoAulaController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'TipoAulaController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'TipoAulaController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // TipoPreguntaSeguridad routes
    'tipo_pregunta_seguridad' => [
        'index' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'index'],
        'crear' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'create'],
        'guardar' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'delete', 'method' => 'POST'],
    ],

    // Trayecto routes
    'trayecto' => [
        'index' => ['controller' => 'TrayectoController', 'action' => 'index'],
        'crear' => ['controller' => 'TrayectoController', 'action' => 'create'],
        'guardar' => ['controller' => 'TrayectoController', 'action' => 'store', 'method' => 'POST'],
        'editar/{id}' => ['controller' => 'TrayectoController', 'action' => 'edit'],
        'actualizar/{id}' => ['controller' => 'TrayectoController', 'action' => 'update', 'method' => 'POST'],
        'eliminar/{id}' => ['controller' => 'TrayectoController', 'action' => 'delete', 'method' => 'POST'],
    ],
];