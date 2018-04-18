<?php
declare(strict_types = 1);

require __DIR__ . "/../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$map    = [
    '/sample' => "sample"
];

$path = $request->getPathInfo();
if (isset($map[$path])) {
    ob_start();
    include sprintf(__DIR__."/../src/templates/%s.php", $map[$path]);
    $response = new Response(ob_get_clean());
} else {
    $response = new Response("Page not found", 404);
}

$response->send();