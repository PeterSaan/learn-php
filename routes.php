<?php

use App\Router;
use App\Controllers\PublicController;

Router::addRoutes('/', [PublicController::class, 'index']);

Router::addRoutes('/us', [PublicController::class, 'us']);

$router = new App\Router($_SERVER['REQUEST_URI']);
$match = $router->match();
if ($match) {
    call_user_func($match['callback']);
} else {
    http_response_code(404);
}