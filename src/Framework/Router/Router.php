<?php
declare(strict_types=1);

namespace Framework\Router;

class Router {
    private $routes = [];

    public function addRoute(string $routePath, Route $route): void {
        // todo: validation?
        $routePath = strtolower($routePath);
        $this->routes[$routePath] = $route;
    }

    public function getRoute(string $routePath): Route {
        $routePath = strtolower($routePath);
        if (!isset($this->routes[$routePath])) {
            throw new UnknownRouteException($routePath);
        }

        return $this->routes[$routePath];
    }
}