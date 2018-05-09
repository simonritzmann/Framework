<?php
declare(strict_types=1);

namespace Framework\Router;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class RouterTest extends TestCase {
    
    public function testCanAddRoute(): void {
        $method = "GET";
        $path = "/";
        $route = new Route("Controller", "Model", "View", "action");

        $router = new Router();
        $router->addRoute($method, "/", $route);

        $request = Request::create($path, $method);

        $this->assertEquals($route, $router->getRoute($request));
    }

    public function testCannotGetRouteFromUnknownPath(): void {
        $this->expectException(UnknownRouteException::class);

        $path = "/some/unknown/path";
        $request = Request::create($path);

        $router = new Router();
        $router->getRoute($request);
    }

    public function testCannotGetRouteFromUnallowedMethod(): void {
        $this->expectException(MethodNotAllowedException::class);

        $path = "/";
        $method = "PUT";
        $request = Request::create($path, $method);

        $router = new Router();
        $router->getRoute($request);
    }
}
