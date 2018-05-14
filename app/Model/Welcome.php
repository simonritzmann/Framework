<?php
declare(strict_types=1);

namespace App\Model;


use Core\Model;

class Welcome extends Model {
    private $name = "";

    public function getData(): array {
        return $this->data;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName($name): void {
        $this->name = $name;
    }
}