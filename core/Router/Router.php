<?php
declare(strict_types=1);

namespace Core\Router;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class Router
 *
 * @package Core\Router
 */
class Router {
    /**
     * @var array Holds all the routes
     */
    private $routes = [];

    /**
     * Add a route
     *
     * @param string $method The HTTP method used
     * @param string $uriPattern URI Pattern
     * @param Route $route A route object that contains all routing details
     */
    public function addRoute(string $method, string $uriPattern, Route $route): void {
        $method = strtolower($method);
        $uriPattern = strtolower($uriPattern);

        $regexPattern = $this->convertRoutePatternToRegexPattern($uriPattern);

        $this->routes[$regexPattern][$method] = $route;
    }

    /**
     * Get the route according to the request URI
     *
     * @param Request $request Request object
     * @return Route Route for the requested URI
     * @throws UnknownRouteException if there is no route defined for the URI
     * @throws MethodNotAllowedException if the HTTP request method is not allowed for the current route
     */
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

    /**
     * Convert URI pattern to regex pattern, e.g. "page/{page}" becomes "~^page/(.*)$~"
     *
     * @param string $uriPattern URI pattern
     * @return string Regex pattern
     */
    private function convertRoutePatternToRegexPattern(string $uriPattern): string {
        $delimiter = "~";
        $uriPattern = preg_quote($uriPattern);

        // preg_quote also escaped "{" and "}", so reverse that
        $uriPattern = str_replace(["\\{", "\\}"], ["{", "}"], $uriPattern);

        $regexPattern = "^" . preg_replace("(\{(.+?)\})", "(.*)", $uriPattern) . "$";
        $regex = $delimiter . $regexPattern . $delimiter;
        return $regex;
    }
}