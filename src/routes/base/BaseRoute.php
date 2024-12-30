<?php
namespace Api\routes\base;

use Api\Utils\ResponseHelper as Response;

abstract class BaseRoute {
    /**
     * [method][endpoint => class_method_name]
     * @var array
     */
    protected $routes = [];

    public function __construct() {
        $this->routes = $this->getRoutes();
    }

    /**
     * Define all routes
     * [method][endpoint => class_method_name]
     *
     * @return array
     */
    abstract public function getRoutes(): array;

    /**
     * compare routes with function
     *
     * @return void
     * @throws \Exception
     */
    public function handleRequest(): void
    {
        $requestUri    = parse_url($_SERVER['REQUEST_URI'] ?? null, PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'] ?? null;
        $classname     = get_class($this);

        try {
            if (!array_key_exists($requestMethod, $this->routes)) {
                Response::send(404, "Method {$requestMethod} not found in {$classname}");
            }

            if (!array_key_exists($requestUri, $this->routes[$requestMethod])) {
                Response::send(404, "Route not found");
            }

            $methodSuffix = $this->routes[$requestMethod][$requestUri];

            if (method_exists($classname, $methodSuffix)) {
                ($this)->$methodSuffix();
            } else {
                Response::send(404, "Action {$methodSuffix} not found in {$classname}");
            }
        } catch (\Exception $e) {
            throw new \Exception("Request went wrong {$e->getMessage()}");
        }
    }
}
