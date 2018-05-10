<?php
declare(strict_types=1);

namespace Framework\Router;

use Exception;
use Throwable;

class MethodNotAllowedException extends Exception {
    public function __construct(string $method, int $code = 0, Throwable $previous = null) {
        $message = "Method '$method' not allowed";
        parent::__construct($message, $code, $previous);
    }
}