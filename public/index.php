<?php
declare(strict_types=1);

require __DIR__ . "/../src/bootstrap.php";

use Framework\FrontController;
use Framework\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

// load routes from file
$routes = require BASE_DIR . "/src/routes.php";

// create router and add routes
$router = new Router();
foreach ($routes as $route) {
    $router->addRoute($route[0], $route[1], $route[2]);
}

$frontController = new FrontController($router, $request, $response);
$response = $frontController->getResponse();

$response->send();