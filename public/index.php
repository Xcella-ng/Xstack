<?php
define('ROOT', dirname(__DIR__));

/* Require Composer Autoload */
// require "$BASE/../vendor";

/* Start App Session */
session_name('messenger');
session_start();

/* Require the App Helper file */
require_once ROOT . '/system/Helpers/app.php';

/* Require App Autoload */
require ROOT . '/system/autoload.php';
