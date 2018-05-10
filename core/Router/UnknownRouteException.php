<?php
declare(strict_types=1);


namespace Core\Router;

use Exception;
use Throwable;

class UnknownRouteException extends Exception {
    public function __construct(string $routePath, int $code = 0, Throwable $previous = null) {
        $message = "Route for path '$routePath' not found";
        parent::__construct($message, $code, $previous);
    }
}