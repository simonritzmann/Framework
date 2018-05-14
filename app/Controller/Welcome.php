<?php
declare(strict_types=1);

namespace App\Controller;

use Core\Controller;

class Welcome extends Controller {
    public function welcomeAction(string $name): void {
        $this->model->setName($name);
    }
}