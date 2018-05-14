<?php
declare(strict_types=1);

namespace Core\Router;

use Symfony\Component\HttpFoundation\Request;

class Router {
    private $routes = [];

    public function addRoute(string $method, string $routePattern, Route $route): void {
        $method = strtolower($method);
        $routePattern = strtolower($routePattern);

        $regexPattern = $this->convertRoutePatternToRegexPattern($routePattern);

        $this->routes[$regexPattern][$method] = $route;
    }

    public function getRoute(Request $request): Route {

        $uri = strtolower($request->getRequestUri());
        $routeFound = false;
        foreach (array_keys($this->routes) as $regex) {
            if (preg_match($regex, $uri, $matches)) {
                $routeFound = true;
                break;
            }
        }

        if (!$routeFound) {
            throw new UnknownRouteException($uri);
        }

        $method = strtolower($request->getMethod());
        if (!isset($this->routes[$regex][$method])) {
            throw new MethodNotAllowedException($method);
        }

        return $this->routes[$regex][$method];
    }

    // todo: e.g. "page/{page}" becomes "~^page/(.*)$~"
    private function convertRoutePatternToRegexPattern(string $routePattern): string {
        $routePattern = preg_quote($routePattern);

        // preg_quote also escapes "{" and "}", so reverse that
        $routePattern = str_replace(["\\{", "\\}"], ["{", "}"], $routePattern);

        $regexPattern = "~^". preg_replace("(\{(.+?)\})", "(.*)", $routePattern) . "$~";
        return $regexPattern;
    }
}