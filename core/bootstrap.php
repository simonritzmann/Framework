<?php
declare(strict_types=1);

/**
 * Path of the project root
 */
const BASE_DIR = __DIR__ . "/..";

/**
 * Path of the 'core' folder
 */
const CORE_DIR = BASE_DIR . "/core";

/**
 * Path of the 'app' folder
 */
const APP_DIR = BASE_DIR . "/app";

/**
 * Path of the 'templates' folder
 */
const TEMPLATE_DIR = APP_DIR. "/View/templates";

/**
 * Namespace for all controllers
 */
const CONTROLLER_NAMESPACE = "App\\Controller\\";

/**
 * Namespace for all models
 */
const MODEL_NAMESPACE = "App\\Model\\";

/**
 * Namespace for all views
 */
const VIEW_NAMESPACE = "App\\View\\";

/**
 * Load composers autoloader
 */
require BASE_DIR . "/vendor/autoload.php";