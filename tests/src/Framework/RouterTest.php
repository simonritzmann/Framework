<?php
declare(strict_types=1);

namespace Framework\Router;

use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase {
    
    public function testCanAddRoute(): void {
        $path = "/";
        $route = new Route("Controller", "Model", "View", "action");

        $router = new Router();
        $router->addRoute($path, $route);

        $this->assertEquals($route, $router->getRoute($path));
    }

    public function testCannotGetRouteFromUnknownPath(): void {
        $this->expectException(UnknownRouteException::class);

        $path = "/some/unknown/path";
        $router = new Router();
        $router->getRoute($path);
    }
}
