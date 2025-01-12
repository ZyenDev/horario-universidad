<?php
require_once '../config/routes.php';
require_once '../app/core/Router.php';

use App\Core\Router;

// Cargar las rutas y ejecutar el enrutador
$router = new Router();
$router->loadRoutes($routes);
$router->dispatch();