<?php
declare(strict_types=1);


namespace App\Controller;

use Core\Controller;
use Core\Model;

class Welcome implements Controller {
    private $model;

    public function __construct(Model $model) {
        $this->model;
    }

    // todo
    public function welcomeAction(): void {

    }

    public function output() {

    }
}