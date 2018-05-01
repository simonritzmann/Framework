<?php
declare(strict_types = 1);
$routes = [];

$routes[] = ["GET", "/", "Homepage\Controller\HomepageController::render"];

return $routes;