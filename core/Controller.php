<?php
declare(strict_types=1);

namespace Core;

abstract class Controller {
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }
}