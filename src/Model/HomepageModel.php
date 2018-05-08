<?php
declare(strict_types=1);

namespace Model;

class HomepageModel {
    private $text;
    
    public function __construct() {
        $this->text = "Welcome to our website!";
    }
}
