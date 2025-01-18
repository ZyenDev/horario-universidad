<?php

$routes = [
    // Auth routes
    '/' => ['controller' => 'AuthController', 'action' => 'index'],
    'login' => ['controller' => 'AuthController', 'action' => 'login'],
    'logout' => ['controller' => 'AuthController', 'action' => 'logout'],

    // Rutas del Coordinador
    '/coordinador' => ['controller' => 'CoordinadorController', 'action' => 'index'],
    '/coordinador/profesor' => ['controller' => 'ProfesorController', 'action' => 'index'],
    '/coordinador/profesor/crear' => ['controller' => 'ProfesorController', 'action' => 'create'],
    '/coordinador/profesor/guardar' => ['controller' => 'ProfesorController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/profesor/editar/{id}' => ['controller' => 'ProfesorController', 'action' => 'edit', 'method' => 'POST'],
    '/coordinador/profesor/actualizar/{id}' => ['controller' => 'ProfesorController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/profesor/eliminar/{id}' => ['controller' => 'ProfesorController', 'action' => 'delete', 'method' => 'POST'],

    '/coordinador/alumnos' => ['controller' => 'AlumnoController', 'action' => 'index'],
    '/coordinador/alumnos/crear' => ['controller' => 'AlumnoController', 'action' => 'create'],
    '/coordinador/alumnos/guardar' => ['controller' => 'AlumnoController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/alumnos/editar/{id}' => ['controller' => 'AlumnoController', 'action' => 'edit'],
    '/coordinador/alumnos/actualizar/{id}' => ['controller' => 'AlumnoController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/alumnos/eliminar/{id}' => ['controller' => 'AlumnoController', 'action' => 'delete', 'method' => 'POST'],

    '/coordinador/materia' => ['controller' => 'MateriaController', 'action' => 'index'],
    '/coordinador/materia/crear' => ['controller' => 'MateriaController', 'action' => 'create'],
    '/coordinador/materia/guardar' => ['controller' => 'MateriaController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/materia/editar/{id}' => ['controller' => 'MateriaController', 'action' => 'edit', 'method' => 'POST'],
    '/coordinador/materia/actualizar/{id}' => ['controller' => 'MateriaController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/materia/eliminar/{id}' => ['controller' => 'MateriaController', 'action' => 'delete', 'method' => 'POST'],

    '/coordinador/aula' => ['controller' => 'AulaController', 'action' => 'index'],
    '/coordinador/aula/crear' => ['controller' => 'AulaController', 'action' => 'create'],
    '/coordinador/aula/guardar' => ['controller' => 'AulaController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/aula/editar/{id}' => ['controller' => 'AulaController', 'action' => 'edit', 'method' => 'POST'],
    '/coordinador/aula/actualizar/{id}' => ['controller' => 'AulaController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/aula/eliminar/{id}' => ['controller' => 'AulaController', 'action' => 'delete', 'method' => 'POST'],

    '/coordinador/tipos_aula' => ['controller' => 'TipoAulaController', 'action' => 'index'],
    '/coordinador/tipos_aula/crear' => ['controller' => 'TipoAulaController', 'action' => 'create'],
    '/coordinador/tipos_aula/guardar' => ['controller' => 'TipoAulaController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/tipos_aula/editar/{id}' => ['controller' => 'TipoAulaController', 'action' => 'edit', 'method' => 'POST'],
    '/coordinador/tipos_aula/actualizar/{id}' => ['controller' => 'TipoAulaController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/tipos_aula/eliminar/{id}' => ['controller' => 'TipoAulaController', 'action' => 'delete', 'method' => 'POST'],

    '/coordinador/trayecto' => ['controller' => 'TrayectoController', 'action' => 'index'],
    '/coordinador/trayecto/crear' => ['controller' => 'TrayectoController', 'action' => 'create'],
    '/coordinador/trayecto/guardar' => ['controller' => 'TrayectoController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/trayecto/editar/{id}' => ['controller' => 'TrayectoController', 'action' => 'edit', 'method' => 'POST'],
    '/coordinador/trayecto/actualizar/{id}' => ['controller' => 'TrayectoController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/trayecto/eliminar/{id}' => ['controller' => 'TrayectoController', 'action' => 'delete', 'method' => 'POST'],

    '/coordinador/bloque_horario' => ['controller' => 'BloqueHorarioController', 'action' => 'index'],
    '/coordinador/bloque_horario/crear' => ['controller' => 'BloqueHorarioController', 'action' => 'create'],
    '/coordinador/bloque_horario/guardar' => ['controller' => 'BloqueHorarioController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/bloque_horario/editar/{id}' => ['controller' => 'BloqueHorarioController', 'action' => 'edit', 'method' => 'POST'],
    '/coordinador/bloque_horario/actualizar/{id}' => ['controller' => 'BloqueHorarioController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/bloque_horario/eliminar/{id}' => ['controller' => 'BloqueHorarioController', 'action' => 'delete', 'method' => 'POST'],

    '/coordinador/persona' => ['controller' => 'PersonaController', 'action' => 'index'],
    '/coordinador/persona/crear' => ['controller' => 'PersonaController', 'action' => 'create'],
    '/coordinador/persona/guardar' => ['controller' => 'PersonaController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/persona/editar/{id}' => ['controller' => 'PersonaController', 'action' => 'edit', 'method' => 'POST'],
    '/coordinador/persona/actualizar/{id}' => ['controller' => 'PersonaController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/persona/eliminar/{id}' => ['controller' => 'PersonaController', 'action' => 'delete', 'method' => 'POST'],

    '/coordinador/rol' => ['controller' => 'RolController', 'action' => 'index'],
    '/coordinador/rol/crear' => ['controller' => 'RolController', 'action' => 'create'],
    '/coordinador/rol/guardar' => ['controller' => 'RolController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/rol/editar/{id}' => ['controller' => 'RolController', 'action' => 'edit', 'method' => 'POST'],
    '/coordinador/rol/actualizar/{id}' => ['controller' => 'RolController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/rol/eliminar/{id}' => ['controller' => 'RolController', 'action' => 'delete', 'method' => 'POST'],

    '/coordinador/usuarios' => ['controller' => 'UsuarioController', 'action' => 'index'],
    '/coordinador/usuarios/crear' => ['controller' => 'UsuarioController', 'action' => 'create'],
    '/coordinador/usuarios/guardar' => ['controller' => 'UsuarioController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/usuarios/editar/{id}' => ['controller' => 'UsuarioController', 'action' => 'edit', 'method' => 'POST'],
    '/coordinador/usuarios/actualizar/{id}' => ['controller' => 'UsuarioController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/usuarios/eliminar/{id}' => ['controller' => 'UsuarioController', 'action' => 'delete', 'method' => 'POST'],

    '/coordinador/pregunta_seguridad' => ['controller' => 'PreguntaSeguridadController', 'action' => 'index'],
    '/coordinador/pregunta_seguridad/crear' => ['controller' => 'PreguntaSeguridadController', 'action' => 'create'],
    '/coordinador/pregunta_seguridad/guardar' => ['controller' => 'PreguntaSeguridadController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/pregunta_seguridad/editar/{id}' => ['controller' => 'PreguntaSeguridadController', 'action' => 'edit', 'method' => 'POST'],
    '/coordinador/pregunta_seguridad/actualizar/{id}' => ['controller' => 'PreguntaSeguridadController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/pregunta_seguridad/eliminar/{id}' => ['controller' => 'PreguntaSeguridadController', 'action' => 'delete', 'method' => 'POST'],

    '/coordinador/tipo_pregunta_seguridad' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'index'],
    '/coordinador/tipo_pregunta_seguridad/crear' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'create'],
    '/coordinador/tipo_pregunta_seguridad/guardar' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'store', 'method' => 'POST'],
    '/coordinador/tipo_pregunta_seguridad/editar/{id}' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'edit', 'method' => 'POST'],
    '/coordinador/tipo_pregunta_seguridad/actualizar/{id}' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'update', 'method' => 'POST'],
    '/coordinador/tipo_pregunta_seguridad/eliminar/{id}' => ['controller' => 'TipoPreguntaSeguridadController', 'action' => 'delete', 'method' => 'POST'],
];