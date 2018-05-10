<?php
declare(strict_types=1);

const BASE_DIR = __DIR__ . "/..";

const CORE_DIR = BASE_DIR . "/core";

const APP_DIR = BASE_DIR . "/app";

const TEMPLATE_DIR = APP_DIR. "/View/templates";

/*
 * Namespace for controllers
 */
const CONTROLLER_NAMESPACE = "App\\Controller\\";

/*
 * Namespace for models
 */
const MODEL_NAMESPACE = "App\\Model\\";

/*
 * Namespace for views
 */
const VIEW_NAMESPACE = "App\\View\\";

// Include composers autoloader
require BASE_DIR . "/vendor/autoload.php";