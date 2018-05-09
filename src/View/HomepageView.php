<?php
declare(strict_types=1);

namespace View;

use Framework\Model;
use Framework\View;

class HomepageView implements View {
    private $model;
    private $template;
    
    public function __construct(Model $model) {
        $this->model = $model;
        // todo:
        $this->template = BASE_DIR . "/src/templates/homepage.php";
    }
    
    public function render() {
        // TODO: data injection through model
        
        ob_start();
        include $this->template;
        return ob_get_clean();
    }
}
