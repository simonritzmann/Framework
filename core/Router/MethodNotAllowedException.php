<?php
declare(strict_types=1);

namespace Core\Router;

use Exception;
use Throwable;

/**
 * Class MethodNotAllowedException
 *
 * @package Core\Router
 */
class MethodNotAllowedException extends Exception {
    /**
     * MethodNotAllowedException constructor.
     *
     * @param string $method HTTP method that isn't allowed
     * @param int $code (optional) Code of the exception
     * @param Throwable|null $previous (optional) Previous exception
     */
    public function __construct(string $method, int $code = 0, Throwable $previous = null) {
        $message = "Method '$method' not allowed";
        parent::__construct($message, $code, $previous);
    }
}