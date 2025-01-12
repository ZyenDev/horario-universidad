<?php
namespace App\Core;

//Clase base para todos los controladores de la aplicacion

class Controller {
    protected function render($view, $data = []) {
        extract($data);
        require_once "../app/views/{$view}.php";
    }
}