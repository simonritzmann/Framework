<?php
declare(strict_types=1);

namespace Framework;

interface Controller {
    public function __construct(Model $model);
}