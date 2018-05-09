<?php
declare(strict_types=1);

require __DIR__ . "/../src/bootstrap.php";

use Framework\Router\Router;
use Framework\Router\UnknownRouteException;
use Framework\Router\MethodNotAllowedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

// load routes from file
$routes = require BASE_DIR . "/src/routes.php";

// create router and add routes
$router = new Router();
foreach ($routes as $route) {
    $router->addRoute($route[0], $route[1], $route[2]);
}

$response = new Response();
try {
    $route = $router->getRoute($request);

    $controllerName = CONTROLLER_NAMESPACE . $route->getControllerName();
    $modelName = MODEL_NAMESPACE . $route->getModelName();
    $viewName = VIEW_NAMESPACE . $route->getViewName();
    $actionName = $route->getActionName();

    $model = new $modelName();
    $controller = new $controllerName($model);
    $view = new $viewName($model, "tmp");

    if (!is_null($actionName)) {
        $controller->$actionName();
    }

    $response->setContent($view->render());
} catch (UnknownRouteException $e) {
    $response->setStatusCode(404);
    $response->setContent("Page not found");
} catch (MethodNotAllowedException $e) {
    $response->setStatusCode(405);
    $response->setContent("Method not allowed");
}

$response->send();