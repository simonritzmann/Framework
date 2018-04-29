<?php
declare(strict_types = 1);
$routes = [];

$routes[] = ["GET", "/", "Sample\Controller\SampleController::render"];

return $routes;