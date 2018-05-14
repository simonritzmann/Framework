<?php
declare(strict_types=1);

namespace Core;

abstract class  View {
    protected $model;
    protected $template;

    public function __construct(Model $model, string $template) {
        $this->model = $model;
        $this->template = $template;
    }
    abstract public function output(): string;

    protected function render($data = []) {
        extract($data);

        ob_start();
        include TEMPLATE_DIR . "/" . $this->template;
        return ob_get_clean();
    }
}