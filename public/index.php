<?php
define('ROOT', dirname(__DIR__));

/* Require Composer Autoload */
// require "$BASE/../vendor";

/* Require the App Helper file */
require_once ROOT . '/system/Helpers/app.php';

// /* Start App Session */
// session_name(config('APP_NAME') ?? 'xstack');
// session_start();

/* Require App Autoload */
require ROOT . '/system/autoload.php';
