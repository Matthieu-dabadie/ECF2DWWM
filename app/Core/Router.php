<?php

namespace App\Core;

class Router
{
    public function routes()
    {
        $controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'home';
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        $controllerClassName = '\\App\\Controllers\\' . $controllerName . 'Controller';
        if (class_exists($controllerClassName)) {
            $controllerInstance = new $controllerClassName();
            if (method_exists($controllerInstance, $action)) {
                $params = $_GET;
                unset($params['controller'], $params['action']);
                call_user_func_array([$controllerInstance, $action], $params);
            } else {
                http_response_code(404);
                echo "La page recherchée n'existe pas";
            }
        } else {
            http_response_code(404);
            echo "La page/controller recherchée n'existe pas";
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            echo '<pre>';
            var_dump($controllerClassName);
            echo '</pre>';
            exit;
        }
    }
}
