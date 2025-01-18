<?php

require_once __DIR__ . '/app/core/Router.php';
require_once __DIR__ . '/config/Routes.php';

use App\Core\Router;

$router = new Router($routes);
$router->dispatch($_SERVER['REQUEST_URI']);