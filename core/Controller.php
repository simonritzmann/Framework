<?php
declare(strict_types=1);

namespace Core;

/**
 * Base class for all controllers
 *
 * @package Core
 */
abstract class Controller {
    /**
     * @var Model Contains the model for this controller
     */
    protected $model;

    /**
     * Controller constructor.
     *
     * @param Model $model The model to be used by the controller
     */
    public function __construct(Model $model) {
        $this->model = $model;
    }
}