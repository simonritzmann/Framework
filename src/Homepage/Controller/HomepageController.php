<?php
declare(strict_types=1);

namespace Homepage\Controller;

use Framework\View\ViewLoader;
use Framework\View\InvalidViewException;

class HomepageController {
    private $model;
    
    public function welcomeAction($request,$response) {
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
