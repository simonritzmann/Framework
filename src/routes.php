<?php
declare(strict_types=1);

use Framework\Router\Route;

$routes = [];
$routes[] = ["/", new Route("HomepageController", "HomepageModel", "HomepageView", "welcomeAction")];

return $routes;