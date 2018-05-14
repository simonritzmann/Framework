<?php
declare(strict_types=1);

namespace Core\Router;

/**
 * Class Route
 *
 * @package Core\Router
 */
class Route {
    /**
     * @var string Name of the Model/View/Controller classes
     */
    private $className;
    /**
     * @var string PHP template to be used by the view
     */
    private $template;
    /**
     * @var string
     */
    private $action;

    /**
     * Route constructor.
     * @param string $className Name of the Model/View/Controller classes
     * @param string $template Template to be rendered
     * @param string|null $action (optional) Action to be executed on the controller
     */
    public function __construct(string $className, string $template, string $action = null) {
        $this->className = $className;
        $this->template = $template;
        $this->action = $action;
    }

    /**
     * Returns the fully qualified name of the controller
     *
     * @return string
     */
    public function getController(): string {
        return $this->getFullyQualifiedName(CONTROLLER_NAMESPACE);
    }

    /**
     * Returns the fully qualified name of the model
     *
     * @return string
     */
    public function getModel(): string {
        return $this->getFullyQualifiedName(MODEL_NAMESPACE);
    }

    /**
     * Returns the fully qualified name of the view
     *
     * @return string
     */
    public function getView(): string {
        return $this->getFullyQualifiedName(VIEW_NAMESPACE);
    }

    /**
     * Returns the name of the template file
     *
     * @return string
     */
    public function getTemplate(): string {
        return $this->template;
    }

    /**
     * Returns the action to be executed on the controller or null if not defined
     *
     * @return null|string
     */
    public function getAction(): ?string {
        return $this->action;
    }

    /**
     * Returns a fully qualified name for the class
     *
     * @param string $namespace
     * @return string
     */
    private function getFullyQualifiedName(string $namespace): string {
        return $namespace . $this->className;
    }
}
