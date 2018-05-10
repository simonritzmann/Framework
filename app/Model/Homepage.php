<?php
declare(strict_types=1);

namespace App\Model;

use Core\Model;

class Homepage implements Model {
    private $title;
    private $name;

    public function getTitle(): ?string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }
}
