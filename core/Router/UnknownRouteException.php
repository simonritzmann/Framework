<?php
declare(strict_types=1);


namespace Core\Router;

use Exception;
use Throwable;

/**
 * Class UnknownRouteException
 *
 * @package Core\Router
 */
class UnknownRouteException extends Exception {
    /**
     * UnknownRouteException constructor.
     *
     * @param string $routePath Path that couldn't be found
     * @param int $code (optional) Code of the exception
     * @param Throwable|null $previous (optional) Previous exception
     */
    public function __construct(string $routePath, int $code = 0, Throwable $previous = null) {
        $message = "Route for path '$routePath' not found";
        parent::__construct($message, $code, $previous);
    }
}