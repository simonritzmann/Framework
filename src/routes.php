<?php
declare(strict_types=1);

use Framework\Router\Route;

$routes = [];
$routes[] = ["GET", "/", new Route("HomepageController", "HomepageModel", "HomepageView", "welcomeAction")];

return $routes;