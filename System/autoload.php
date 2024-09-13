<?php

use System\Base\Router;

// Autoload classes
spl_autoload_register(fn($class) => loadFile($class));

/* Initialize Router */
// $ROUTER = new Router();

/* Require the constants file */
require_once ROOT . '/system/constants.php';

/* Require the web routes file */
require_once ROOT . '/routes/web.php';
