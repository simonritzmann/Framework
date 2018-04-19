<?php
declare(strict_types = 1);
$routes = [];

// todo: don't instantiate every controller
$routes[] = ["GET", "/sample", [new SampleController(), "render"]];

return $routes;