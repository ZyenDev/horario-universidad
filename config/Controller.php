<?php
namespace App\Config;

//Clase base para todos los controladores de la aplicacion

class Controller {
    protected function render($view, $data = []) {
        extract($data);
        require_once "../app/views/{$view}.php";
    }

    protected function redirect($url) {
        header("Location: $url");
        exit();
    }

    protected function setFlash($type, $message) {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = [];
        }
        $_SESSION['flash'][$type] = $message;
    }

    protected function getFlash($type) {
        if (isset($_SESSION['flash'][$type])) {
            $message = $_SESSION['flash'][$type];
            unset($_SESSION['flash'][$type]);
            return $message;
        }
        return null;
    }

    protected function validateRequestMethod($method) {
        return $_SERVER['REQUEST_METHOD'] === strtoupper($method);
    }

    protected function getPostData() {
        return $_POST;
    }

    protected function sanitizeInput($data) {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->sanitizeInput($value);
            }
        } else {
            $data = htmlspecialchars(strip_tags(trim($data)));
        }
        return $data;
    }

    protected function isAjaxRequest() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
               strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    protected function sendJsonResponse($data, $statusCode = 200) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit();
    }
}

