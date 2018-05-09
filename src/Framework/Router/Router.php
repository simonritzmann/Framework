<?php
declare(strict_types=1);

namespace Framework\Router;

use Symfony\Component\HttpFoundation\Request;

class Router {
    private $routes = [];

    public function addRoute(string $method, string $routePath, Route $route): void {
        $method = strtolower($method);
        $routePath = strtolower($routePath);
        $this->routes[$method][$routePath] = $route;
    }

    public function getRoute(Request $request): Route {
        $method = strtolower($request->getMethod());
        if (!isset($this->routes[$method])) {
            throw new MethodNotAllowedException($method);
        }

        $routePath = strtolower($request->getPathInfo());
        if (!isset($this->routes[$method][$routePath])) {
            throw new UnknownRouteException($routePath);
        }

        return $this->routes[$method][$routePath];
    }
}