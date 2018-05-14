<?php
declare(strict_types=1);

require __DIR__ . "/../core/bootstrap.php";

use Core\FrontController;
use Core\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

ini_set("display_errors", "on");
error_reporting(E_ALL);

// instantiate request and response objects
$request = Request::createFromGlobals();
$response = new Response();

// load routes
$routes = require APP_DIR . "/routes.php";

// create router
$router = new Router();
foreach ($routes as $route) {
    $router->addRoute($route[0], $route[1], $route[2]);
}

// instantiate the front controller and get the output
$frontController = new FrontController($router, $request, $response);
$response = $frontController->getResponse();

$response->send();