<?php
declare(strict_types = 1);

require __DIR__ . "/../src/bootstrap.php";
require __DIR__ . "/../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

$map    = [
    '/sample' => __DIR__ . "/../src/templates/sample.php"
];

$path = $request->getPathInfo();
if (isset($map[$path])) {
    ob_start();
    include $map[$path];
    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(404);
    $response->setContent("Page not found");
}

$response->send();