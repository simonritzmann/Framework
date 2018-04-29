<?php
declare(strict_types = 1);

namespace Sample\Controller;

use Symfony\Component\HttpFoundation\Response;

class SampleController {
    public function render($request) {
        return new Response("Hello World!");
    }
}
