<?php
declare(strict_types=1);

namespace App\View;

use Core\View;

class Welcome extends View {
    public function output(): string {
        $data = [];
        $data["name"] = $this->model->getName();

        return $this->render($data);
    }
}