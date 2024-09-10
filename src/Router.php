<?php

namespace App;

class Router {
    public static $routes;
    public $path;
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function match() {
        foreach (self::$routes as $route) {
            if ($route['path'] === $this->path) {
                return $route;
            }
        }
        return false;
    }

    public static function addRoutes($path, $callback) {
        self::$routes[] = ['path' => $path, 'callback' => $callback];
    }
}