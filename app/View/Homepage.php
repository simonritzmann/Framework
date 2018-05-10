<?php
declare(strict_types=1);

namespace App\View;

use Core\Model;
use Core\View;

class Homepage implements View {
    private $model;
    private $template;
    
    public function __construct(Model $model, string $template) {
        $this->model = $model;
        $this->template = $template;
    }

    public function render() {
        $title = $this->model->getTitle();
        $name = $this->model->getName();

        ob_start();
        // todo:
        include TEMPLATE_DIR . "/" . $this->template;
        return ob_get_clean();
    }
}
