<?php
namespace App\Core;

class Router {
    private $routes = [];

    public function loadRoutes($routes) {
        $this->routes = $routes;
    }

    public function dispatch() {
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        $url = parse_url($url, PHP_URL_PATH);

        if (array_key_exists($url, $this->routes)) {
            $controllerName = $this->routes[$url]['controller'];
            $action = $this->routes[$url]['action'];
            
            require_once "../app/controllers/{$controllerName}.php";
            $controller = new $controllerName();
            call_user_func([$controller, $action]);
        } else {
            http_response_code(404);
            echo "404 - Página no encontrada";
        }
    }
}