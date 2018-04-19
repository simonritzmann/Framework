<?php
declare(strict_types = 1);

require __DIR__."/../vendor/autoload.php";

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$dispatcher = FastRoute\simpleDispatcher(function(RouteCollector $rc) {
    $routes = include(__DIR__."/../src/routes.php");
    foreach ($routes as $route) {
        $rc->addRoute($route[0], $route[1], $route[2]);
    }
});

$controllerResolver = new Framework\ControllerResolver();

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
switch ($routeInfo[0]) {
    case Dispatcher::FOUND:
        $controller = $controllerResolver->getController($routeInfo[1]);
        $response = call_user_func($controller, $request);
        break;
    case Dispatcher::NOT_FOUND:
        $response = new Response("Page not found", 404);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response = new Response("Method not allowed", 405);
        break;
    default:
        $response = new Response("Internal server error", 500);
        break;
}

$response->send();