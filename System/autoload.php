<?php
$classes = [];
// Autoload classes
spl_autoload_register(fn($class) => $classes[] = loadFile($class));

/* Start App Session */
session_name(config('APP_NAME') ?? 'xstack');
session_start();

/* Initialize Router */
// $ROUTER = new Router();

/* Require the constants file */
require_once ROOT . '/system/constants.php';

/* Require the web routes file */
require_once ROOT . '/routes/web.php';

/* Require router error file */
require_once ROOT . '/system/stack.php';
