<?php
declare(strict_types = 1);

require __DIR__."/../../vendor/autoload.php";
use Symfony\Component\HttpFoundation\Response;

class SampleController {
    public function render($request) {
        return new Response("Hello World!");
    }
}
