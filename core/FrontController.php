<?php
declare(strict_types=1);

namespace Core;

use Core\Router\MethodNotAllowedException;
use Core\Router\Router;
use Core\Router\UnknownRouteException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontController {
    private $response;

    public function __construct(Router $router, Request $request, Response $response) {
        $this->response = $response;
        try {
            $route = $router->getRoute($request);

            $controllerName = $route->getController();
            $modelName = $route->getModel();
            $viewName = $route->getView();
            $action = $route->getAction();
            $template = $route->getTemplate();

            $model = new $modelName();
            $controller = new $controllerName($model);
            $view = new $viewName($model, $template);

            if (!is_null($action)) {
                $controller->$action();
            }

            $this->setResponse(200, $view->output());
        } catch (UnknownRouteException $e) {
            $this->setResponse(404, "Page not found");
        } catch (MethodNotAllowedException $e) {
            $this->setResponse(405, "Method not allowed");
        }
    }

    private function setResponse(int $statusCode, string $content): void {
        $this->response->setStatusCode($statusCode);
        $this->response->setContent($content);
    }

    public function getResponse(): Response {
        return $this->response;
    }
}