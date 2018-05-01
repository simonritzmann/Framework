<?php
declare(strict_types = 1);

namespace Homepage\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomepageController {
    public function render($request) {
        return new Response("Welcome to our website!");
    }
}
