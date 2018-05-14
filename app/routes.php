<?php
declare(strict_types=1);

use Core\Router\Route;

/**
 * Define all your routes here
 */

$routes = [];
$routes[] = ["GET", "/", new Route("Homepage", "homepage.php")];
$routes[] = ["GET", "/welcome?name={name}", new Route("Welcome","welcome.php","welcomeAction")];

return $routes;