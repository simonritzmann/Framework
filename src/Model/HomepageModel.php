<?php
declare(strict_types=1);

namespace Model;

use Framework\Model;

class HomepageModel implements Model {
    private $text;
    
    public function __construct() {
        $this->text = "Welcome to our website!";
    }
}
