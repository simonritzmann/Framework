<?php
declare(strict_types=1);

namespace Core\Router;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class RouterTest extends TestCase {

    public function testCanAddRoute(): void {
        $method = "GET";
        $path = "/";
        $route = new Route("SomeClass", "template.php");

        $request = Request::create($path, $method);

        $router = new Router();
        $router->addRoute($method, "/", $route);

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

        $router = new Router();
        $method = "GET";
        $routePath = "/";
        $router->addRoute($method, $routePath, new Route("SomeClass", "template.php"));

        $unallowedMethod = "PUT";
        $request = Request::create($routePath, $unallowedMethod);

        $router->getRoute($request);
    }
}
