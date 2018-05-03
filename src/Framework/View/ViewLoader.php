<?php
declare(strict_types=1);

namespace Framework\View;

class ViewLoader {
    private $path;
    
    public function __construct($templateDir) {
        $this->path = $templateDir;
    }
    
    public function loadView($viewName) {
        $template = $this->path . $viewName . ".html";
        if (!file_exists($template)) {
            throw new InvalidViewException($viewName);
        }
        
        ob_start();
        include $template;
        return ob_get_clean();
    }
}
