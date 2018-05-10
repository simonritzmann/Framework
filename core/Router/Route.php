<?php
declare(strict_types=1);

namespace Core\Router;

class Route {
    private $className;
    private $template;
    private $action;
    
    public function __construct(string $className, string $template, string $action = null) {
        $this->className = $className;
        $this->template = $template;
        $this->action = $action;
    }

    public function getController(): string {
        return $this->getFullyQualifiedName(CONTROLLER_NAMESPACE);
    }

    public function getModel(): string {
        return $this->getFullyQualifiedName(MODEL_NAMESPACE);
    }

    public function getView(): string {
        return $this->getFullyQualifiedName(VIEW_NAMESPACE);
    }

    public function getTemplate(): string {
        return $this->template;
    }

    public function getAction(): ?string {
        return $this->action;
    }

    private function getFullyQualifiedName(string $namespace): string {
        return $namespace . $this->className;
    }
}
