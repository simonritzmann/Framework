<?php
declare(strict_types=1);

namespace Core;

/**
 * Base class for all views
 *
 * @package Core
 */
abstract class View {
    /**
     * @var Model Contains the model used by this view
     */
    protected $model;
    /**
     * @var string Contains the template file name
     */
    protected $template;

    /**
     * View constructor.
     *
     * @param Model $model Model used by this view
     * @param string $template Name of the template file used by this view
     */
    public function __construct(Model $model, string $template) {
        $this->model = $model;
        $this->template = $template;
    }

    /**
     * Output the view
     *
     * @return string
     */
    abstract public function output(): string;

    /**
     * Render the template file
     *
     * @param array $data Data used in template file
     * @return string The rendered template
     */
    protected function render($data = []) {
        extract($data);

        ob_start();
        include TEMPLATE_DIR . "/" . $this->template;
        return ob_get_clean();
    }
}