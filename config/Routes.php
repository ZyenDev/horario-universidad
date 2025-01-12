<?php

//Rutas de la aplicacion, cada una necesita su accion y su controller
$routes = [
    '/' => ['controller' => 'AuthController', 'action' => 'index'],
    //login

    '/login' => ['controller' => 'AuthController', 'action' => 'login'],
    
    //cronogramas o horarios

    '/cronogramas' => ['controller' => 'CronogramaController', 'action' => 'index'],
    '/cronogramas/crear' => ['controller' => 'CronogramaController', 'action' => 'create'],
    '/cronogramas/guardar' => ['controller' => 'CronogramaController', 'action' => 'store'],

    //planificacion

    '/planificacion' => ['controller' => 'PlanificacionController', 'action' => 'index'],
    '/planificacion/crear' => ['controller' => 'PlanificacionController', 'action' => 'create'],
    '/planificacion/guardar' => ['controller' => 'PlanificacionController', 'action' => 'store'],
    '/planificacion/exportar' => ['controller' => 'PlanificacionController', 'action' => 'export'],

    //usuarios

    '/usuarios' => ['controller' => 'UserController', 'action' => 'index'],
    '/usuarios/crear' => ['controller' => 'UserController', 'action' => 'create'],
    '/usuarios/guardar' => ['controller' => 'UserController', 'action' => 'store'],
    '/usuarios/editar'=> ['controller' => 'UserController', 'action' => 'edit'],
    '/usuarios/actualizar' => ['controller' => 'UserController', 'action' => 'update'],
    '/usuarios/eliminar'=> ['controller' => 'UserController', 'action' => 'delete'],

    //salones

    '/salones' => ['controller' => 'SalonController', 'action' => 'index'],
    '/salones/crear' => ['controller' => 'SalonController', 'action' => 'create'],
    '/salones/guardar' => ['controller' => 'SalonController', 'action' => 'store'],
    '/salones/editar' => ['controller' => 'SalonController', 'action' => 'edit'],
    '/salones/actualizar' => ['controller' => 'SalonController', 'action' => 'update'],
    '/salones/eliminar' => ['controller' => 'SalonController', 'action' => 'delete'],

    //materias

    '/materias' => ['controller' => 'MateriaController', 'action' => 'index'],
    '/materias/crear' => ['controller' => 'MateriaController', 'action' => 'create'],
    '/materias/guardar' => ['controller' => 'MateriaController', 'action' => 'store'],
    '/materias/editar' => ['controller' => 'MateriaController', 'action' => 'edit'],
    '/materias/actualizar' => ['controller' => 'MateriaController', 'action' => 'update'],
    '/materias/eliminar' => ['controller' => 'MateriaController', 'action' => 'delete'],
];