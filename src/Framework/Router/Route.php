<?php
declare(strict_types=1);

namespace Framework\Router;

class Route {
    private $controller;
    private $model;
    private $view;
    private $action;
    
    public function __construct(string $controller, string $model, string $view, string $action = null) {
        $this->controller = $controller;
        $this->model = $model;
        $this->view = $view;
        $this->action = $action;
    }

    public function getControllerName(): string {
        return $this->controller;
    }

    public function getModelName(): string {
        return $this->model;
    }

    public function getViewName(): string {
        return $this->view;
    }

    public function getActionName(): string {
        return $this->action;
    }
}
