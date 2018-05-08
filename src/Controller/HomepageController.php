<?php
declare(strict_types=1);

namespace Controller;

use Framework\View\ViewLoader;
use Framework\View\InvalidViewException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomepageController {
    private $model;
    
    public function welcomeAction(Request $request, Response $response) {
        $templateDir = __DIR__ . "/../templates/"; // TODO: outsource    
 
        try {
            $viewLoader = new ViewLoader($templateDir);
            $response->setContent($viewLoader->loadView("Homepage")); // TODO: dynamic
        } catch (InvalidViewException $e) {
            $response->setStatusCode(404);
            $response->setContent("Page not found");
        }
        return $response;
    }
}
