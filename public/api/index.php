<?php
use Api\Utils\ResponseHelper;

// Always return json
header('Content-Type: application/json; charset=utf-8');

try {
    require_once '../../config/autoloadAPI.php';

    $requestUri = $_SERVER['REQUEST_URI'] ?? null;

    // define route and parts
    $route      = str_replace('/api/', '', parse_url($requestUri, PHP_URL_PATH));
    $routeParts = explode('/', trim($route, '/'));

    // define classes and methods
    $className      = ucfirst($routeParts[0]);
    $classNamespace = "Api\\Routes\\" . $className . 'Route';

    // check if classes and methods exists
    if (class_exists($classNamespace)) {
        (new $classNamespace())->handleRequest();
    } else {
        if (empty($className)) {
            ResponseHelper::send(200, "Api works");
        } else {
            ResponseHelper::send(404, "Route {$className} not found");
        }
    }
} catch (Exception $e) {
    ResponseHelper::send(500, $e->getMessage());
}
