<?php
declare(strict_types=1);

namespace Framework\View;

use Exception;
use Throwable;

class InvalidViewException extends Exception {
    public function __construct(string $viewName, int $code = 0, Throwable $previous = null) {
        $message = "View '$viewName' does not exist";
        parent::__construct($message, $code, $previous);
    }
}
