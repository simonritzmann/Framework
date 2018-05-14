<?php
declare(strict_types=1);

namespace Core;

use Core\Router\MethodNotAllowedException;
use Core\Router\Router;
use Core\Router\UnknownRouteException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FrontController
 *
 * @package Core
 */
class FrontController {
    /**
     * @var Request Contains the current request object
     */
    private $request;
    /**
     * @var Response Contains the current response object
     */
    private $response;

    /**
     * FrontController constructor.
     *
     * @param Router $router Router to be used
     * @param Request $request Current request object
     * @param Response $response Current response object
     */
    public function __construct(Router $router, Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;

        try {
            // try to get a matching route for the request
            $route = $router->getRoute($request);

            // get the names of all components
            $controllerName = $route->getController();
            $modelName = $route->getModel();
            $viewName = $route->getView();
            $action = $route->getAction();
            $template = $route->getTemplate();

            // get the arguments from the request
            $arguments = $this->getArgumentsFromRequest();

            // instantiate model, controller and view
            $model = new $modelName();
            $controller = new $controllerName($model);
            $view = new $viewName($model, $template);

            // execute action on the controller if defined
            if (!is_null($action)) {
                call_user_func_array([$controller, $action], $arguments);
            }

            // get the output and update the response object
            $this->setResponse(200, $view->output());
        } catch (UnknownRouteException $e) {
            $this->setResponse(404, "Page not found");
        } catch (MethodNotAllowedException $e) {
            $this->setResponse(405, "Method not allowed");
        }
    }

    /**
     * Return the request arguments according to the request method
     *
     * @return array An array containing all request arguments
     */
    private function getArgumentsFromRequest(): array {
        $method = $this->request->getMethod();
        if ($method == $this->request::METHOD_GET) {
            return $this->request->query->all();
        } else {
            return $this->request->request->all();
        }
    }

    /**
     * Update the status code and content of the response object
     *
     * @param int $statusCode HTTP status code
     * @param string $content Content of the response
     */
    private function setResponse(int $statusCode, string $content): void {
        $this->response->setStatusCode($statusCode);
        $this->response->setContent($content);
    }

    /**
     * Return response object
     *
     * @return Response Response object
     */
    public function getResponse(): Response {
        return $this->response;
    }
}