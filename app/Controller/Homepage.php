<?php
declare(strict_types=1);

namespace App\Controller;

use Core\Controller;
use Core\Model;

class Homepage implements Controller {
    public function __construct(Model $model) {
        $this->model = $model;
    }
}
