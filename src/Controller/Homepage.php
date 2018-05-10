<?php
declare(strict_types=1);

namespace Controller;

use Framework\Controller;
use Framework\Model;

class Homepage implements Controller {
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function welcomeAction(): void {
        // todo:
    }
}
