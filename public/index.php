<?php
declare(strict_types=1);

require __DIR__."/../vendor/autoload.php";

use Framework\Router\Router;
use Framework\Router\UnknownRouteException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

$router = new Router();
$routes = include(__DIR__."/../src/routes.php");
foreach ($routes as $route) {
    $router->addRoute($route[0], $route[1]);
}

try {
    $route = $router->getRoute($_SERVER['REQUEST_URI']);

    $controllerName = "Controller\\" . $route->getControllerName();
    $modelName = "Model\\" . $route->getModelName();
    $viewName = "View\\" . $route->getViewName();
    $actionName = $route->getActionName();

    $controller = new $controllerName();
    $response = $controller->$actionName($request, $response);

} catch (UnknownRouteException $e) {
    $response->setStatusCode(404);
    $response->setContent("Page not found");
}

$response->send();