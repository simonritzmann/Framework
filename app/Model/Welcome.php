<?php
declare(strict_types=1);

namespace App\Model;


use Core\Model;

class Welcome extends Model {
    private $name = "";

    /**
     * dummy implementation, data would usually be read from a data storage such as a database
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * dummy implementation, data would usually be saved to a data storage such as a database
     */
    public function setName($name): void {
        $this->name = $name;
    }
}