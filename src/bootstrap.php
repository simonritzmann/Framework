<?php
declare(strict_types=1);

const BASE_DIR = __DIR__ . "/..";

const TEMPLATE_DIR = BASE_DIR . "/src/templates/";

/*
 * Namespace for controllers
 */
const CONTROLLER_NAMESPACE = "Controller\\";

/*
 * Namespace for models
 */
const MODEL_NAMESPACE = "Model\\";

/*
 * Namespace for views
 */
const VIEW_NAMESPACE = "View\\";

// Include composers autoloader
require BASE_DIR . "/vendor/autoload.php";