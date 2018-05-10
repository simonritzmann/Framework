<?php
declare(strict_types=1);

use Framework\Router\Route;

$routes = [];
$routes[] = ["GET", "/", new Route("Homepage", "homepage.php")];
$routes[] = ["GET", "/welcome", new Route("Welcome","welcome.php","welcomeAction")];

return $routes;