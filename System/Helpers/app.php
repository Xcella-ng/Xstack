<?php

use System\Base\Dir;

if (!function_exists('env')) {
	function config($name)
	{
		$env = parse_ini_file(Dir::$root . '/.env');
		return $env[$name];
	}
}

if (!function_exists('dd')) {
	function dd(...$vars)
	{
		http_response_code(500);
		foreach ($vars as $var) {
			echo '<pre>';
			(gettype($var) === 'array' || gettype($var) === 'object') ? print_r($var) : print $var;
			echo '</pre>';
		}
		exit;
	}
}

if (!function_exists('getUnderscoredName')) {
	function getUnderscoredName($name)
	{
		$underscored = '';
		$chars = str_split($name);

		foreach ($chars as $key => $char)
			$underscored .= $key && preg_match("/[A-Z]/", $char) ? "_$char" : $char;
		return strtolower($underscored);
	}
}

if (!function_exists('loadFile')) {
	function loadFile($path)
	{
		$file = ROOT . DIRECTORY_SEPARATOR . useDirectorySeparator($path) . '.php';
		file_exists($file) ? require_once $file : die("Could not open stream: $file");
	}
}

if (!function_exists('response')) {
	function response(string|array $data = NULL, $status = 200)
	{
		http_response_code($status);
		return print (is_array($data) || is_object($data)) ? json_encode($data) : $data;
	}
}

if (!function_exists('view')) {
	function view()
	{
		return '';
	}
}

if (!function_exists('useDirectorySeparator')) {
	function useDirectorySeparator($path)
	{
		return str_replace('/', DIRECTORY_SEPARATOR, $path);
	}
}
