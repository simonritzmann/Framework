<?php
declare(strict_types=1);

namespace View;

use Model\HomepageModel;

class HomepageView {
    private $model;
    private $template;
    
    public function __construct(HomepageModel $model, string $template) {
        $this->model = $model;
        $this->template = $template;
    }
    
    public function render() {
        // TODO: data
        
        ob_start();
        include $this->template;
        return ob_get_clean();
    }
}
