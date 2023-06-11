<?php

class Router {
    private $routes = [];

    public function addRoute($route, $handler) {
        if(!is_array($route)){
            $this->routes[$route] = $handler;
        }
        else {
            foreach($route as $item) {
                $this->routes[$item] = $handler;
            }
        }
    }

    public function handleRequest() {
        $request_uri = $_SERVER['REQUEST_URI'];
        $request_method = $_SERVER['REQUEST_METHOD'];

        if ($request_method === 'GET' && array_key_exists($request_uri, $this->routes)) {
            $handler = $this->routes[$request_uri];
            require_once $handler;
        } elseif ($request_method === 'POST') {
            // Обработка POST-запроса
        } elseif ($request_method === 'GET') {
            $params = $_GET;
            $route = strtok($request_uri, '?'); // Извлекаем часть URL-адреса до знака "?"

            if (array_key_exists($route, $this->routes)) {
                $handler = $this->routes[$route];
                require_once $handler;
            } else {
                echo "404 Not Found";
            }
        } else {
            echo "404 Not Found";
        }
    }
}
?>