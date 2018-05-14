<?php
declare(strict_types=1);

namespace App\View;

use Core\View;

class Homepage extends View {
    public function output(): string {
        return $this->render();
    }
}
