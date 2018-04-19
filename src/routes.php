<?php
declare(strict_types = 1);
$routes = [];

$routes[] = ["GET", "/sample", "Framework\Controller\SampleController::render"];

return $routes;