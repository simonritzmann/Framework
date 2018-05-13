<?php
/**
 * Created by PhpStorm.
 * User: Simon Ritzmann
 * Date: 11.05.2018
 * Time: 11:38
 */

namespace App\View;


use Core\Model;
use Core\View;

class Welcome implements View {
    private $model;
    private $template;

    public function __construct(Model $model, string $template) {
        $this->model = $model;
        $this->template = $template;
    }

    public function output(): string {
        // TODO: Implement output() method.
        return "";
    }
}