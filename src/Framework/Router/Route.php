<?php
declare(strict_types=1);

namespace Framework\Router;

class Route {
    private $controller;
    private $model;
    private $view;
    private $action;
    
    public function __construct($controller, $model, $view, $action) {
        $this->controller = $controller;
        $this->model = $model;
        $this->view = $view;
        $this->action = $action;
    }

    public function getControllerName() {
        return $this->controller;
    }

    public function getModelName() {
        return $this->model;
    }

    public function getViewName() {
        return $this->view;
    }

    public function getActionName() {
        return $this->action;
    }
}
