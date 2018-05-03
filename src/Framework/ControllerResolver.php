<?php
declare(strict_types=1);

namespace Framework;

class ControllerResolver {
    public function getController(string $handler): array {
        list($controller, $method) = explode("::", $handler);
        return [new $controller(), $method];
    }
}
