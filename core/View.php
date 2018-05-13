<?php
declare(strict_types=1);

namespace Core;

interface View {
    public function __construct(Model $model, string $template);
    public function output(): string;
}