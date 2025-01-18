<?php

function base_url($path = '') {
    $base_url = isset($_SERVER['BASE_URL']) ? $_SERVER['BASE_URL'] : '';
    
    // Si estamos en un entorno local (localhost)
    if (empty($base_url) && isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost') {
        $base_url = "http://localhost/horario-universidad/app/views"; // Reemplaza 'tu_proyecto' con el nombre de tu carpeta de proyecto si es necesario
    }
    
    // Si aún no tenemos una base_url, usamos la raíz del servidor
    if (empty($base_url)) {
        $base_url = "http://" . $_SERVER['HTTP_HOST'];
    }
    
    // Asegurarse de que no haya doble barra al final de base_url y al principio de path
    $base_url = rtrim($base_url, '/');
    $path = ltrim($path, '/');
    
    return $base_url . '/' . $path;

    if (!function_exists('base_url')) {
        function base_url($path = '') {
            // Adjust this to match your local development URL
            $base_url = 'http://localhost/horario-universidad/';
            return $base_url . ltrim($path, '/');
        }
    }
}

