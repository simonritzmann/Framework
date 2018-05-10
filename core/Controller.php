<?php
declare(strict_types=1);

namespace Core;

interface Controller {
    public function __construct(Model $model);
}