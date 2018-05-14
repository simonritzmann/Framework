<?php
declare(strict_types=1);

namespace Core;

use Core\Router\Router;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FrontControllerTest extends TestCase {

    public function testCanGetResponse() {
        include __DIR__ . "/../../core/bootstrap.php";

        $router = new Router();
        $request = Request::create("/");
        $response = new Response();

        $frontController = new FrontController($router, $request, $response);

        $this->assertSame($response, $frontController->getResponse());
    }
}
