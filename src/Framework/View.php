<?php
declare(strict_types=1);

namespace Framework;

interface View {
    public function __construct(Model $model);
}