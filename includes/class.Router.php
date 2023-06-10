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

    public function handleRequest($request_uri) {
        if (array_key_exists($request_uri, $this->routes)) {
            $handler = $this->routes[$request_uri];
            require_once $handler;
        } else {
            echo "404 Not Found";
        }
    }
}
?>