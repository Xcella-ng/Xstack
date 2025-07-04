<?php
define('ROOT', dirname(__DIR__));

if (mb_strtolower($_SERVER['SERVER_NAME']) !== 'localhost') {
	$path = ROOT . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	
	// Serve static files directly
	if (file_exists($path) && is_file($path))
		return false;
}

/* Require App Autoload */
require ROOT . '/vendor/Xcella/Hodos/autoload.php';

/* Require router error file */
require ROOT . '/vendor/Xcella/Hodos/stack.php';
