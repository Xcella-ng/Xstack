<?php
return [
	'composer.autoload' => env('COMPOSER_AUTOLOADER') ?? false,
	
	'display_errors' => env('DISPLAY_ERRORS'),
	'log_errors' => env('LOG_ERRORS'),
	'timezone' => env('APP_TIMEZONE'),
];
