<?php
declare(strict_types=1);

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

$response = new Response();
$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());
switch ($routeInfo[0]) {
    case Dispatcher::FOUND:
        $controllerResolver = new Framework\ControllerResolver();
        $controller = $controllerResolver->getController($routeInfo[1]);
        $response = call_user_func($controller, $request, $response);
        break;
    case Dispatcher::NOT_FOUND:
        $response->setStatusCode(404);
        $response->setContent("Page not found");
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response->setStatusCode(405);
        $response->setContent("Method not allowed");
        break;
    default:
        $response->setStatusCode(500);
        $response->setContent("Internal server error");
        break;
}

$response->send();