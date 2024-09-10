<?php

function dump(...$data) {
    echo '<pre>';
    var_dump(...$data);
    echo '</pre>';
}

spl_autoload_register(function($class) {
    $class = substr($class, 4);
    require_once "src/$class.php";
});

require 'routes.php';

$router = new App\Router($_SERVER['REQUEST_URI']);
$match = $router->match();

if ($match) {
    if (is_callable($match)) {
        call_user_func($match['callback']);
    } elseif (is_array($match['callback']) && count($match['callback']) === 2) {
        $class = $match['callback'][0];
        $controller = new $class();
        $method = $match['callback'][1];
        $controller->$method();
    }
} else {
    http_response_code(404);
}