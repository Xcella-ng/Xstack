<?php

use System\Base\Dir;
use System\Base\RenderView;
use System\Base\Route;
use System\Base\Router;

if (!function_exists('asset')) {
	function asset($path)
	{
		return BASE_URI . '/' . (config('APP_ASSETS_DIR') ?? 'public/assets') . '/' . $path;
	}
}

if (!function_exists('config')) {
	function config($name)
	{
		$env = parse_ini_file(Dir::root() . '/.env');
		return key_exists($name, $env) ? $env[$name] : NULL;
	}
}

if (!function_exists('constructViewFilePath')) {
	function constructViewFilePath(string $view)
	{
		$path_construct = '';
		$path_array = preg_split('/[.]/', $view);

		foreach ($path_array as $value)
			$path_construct .= $value . (end($path_array) === $value ? NULL : '/');
		return $path_construct;
	}
}

if (!function_exists('current_route')) {
	function current_route(string ...$uri)
	{
		if (!empty($uri)) {
			$match = false;
			foreach ($uri as $value)
				if (request()->route->generatedURI === $value) {
					$match = true;
					break;
				}
			return $match;
		}
		return request()->route->uri;
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

if (!function_exists('getUnderscoredClassName')) {
	function getUnderscoredClassName($class)
	{
		$called_class_exploded = explode(DIRECTORY_SEPARATOR, useDirectorySeparator($class));
		$class_name = end($called_class_exploded);
		return getUnderscoredName($class_name);
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

if (!function_exists('getViewFile')) {
	function getViewFile($file)
	{
		$path = (config('APP_VIEWS_DIR') ?? 'views') . '/' . $file;
		return ROOT . DIRECTORY_SEPARATOR . useDirectorySeparator($path) . '.php';
	}
}

if (!function_exists('loadFile')) {
	function loadFile($path, ?array $data = NULL)
	{
		$file = ROOT . DIRECTORY_SEPARATOR . useDirectorySeparator($path) . '.php';

		if (is_readable($file)) {
			if (!empty($data))
				extract($data);
			return require_once $file;
		}
		die("Could not open stream: $file");
	}
}

if (!function_exists('request')) {
	/**
	 * Summary of request
	 * @return object{route:object{action:array,generatedURI:string,uri:string,method:'any|get|post|put|patch|delete',is_named:bool,name:string},request:object}
	 */
	function request()
	{
		return Route::currentStack()['stack-info'];
	}
}

if (!function_exists('route')) {
	function route(string $name)
	{
		return !empty($name) && !empty(Router::routes($name)) ? Router::routes($name)->generatedURI : throw new Exception("Route name cannot be empty", 1);
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
	function view(string $view, ?array $data = NULL)
	{
		$path_construct = constructViewFilePath($view);
		$path = (config('APP_VIEWS_DIR') ?? 'views') . '/' . $path_construct;

		if (is_readable(ROOT . DIRECTORY_SEPARATOR . useDirectorySeparator($path) . '.php')) {
			$template = new RenderView($path_construct);

			if (!empty($data))
				foreach ($data as $key => $value)
					$template->$key($value);
			return print $template;
		}
	}
}

if (!function_exists('useDirectorySeparator')) {
	function useDirectorySeparator($path)
	{
		return str_replace('/', DIRECTORY_SEPARATOR, $path);
	}
}

// RenderView Helpers
if (!function_exists('attach')) {
	function attach(string $view, ?array $data = NULL)
	{
		view($view, $data);
	}
}

if (!function_exists('extendview')) {
	function extendview($view, ?array $data = NULL)
	{
		RenderView::extend($view, $data);
	}
}

if (!function_exists('endpush')) {
	function endpush()
	{
		RenderView::endsection();
	}
}

if (!function_exists('push')) {
	function push($name, $keep = false, $callbacks = NULL)
	{
		RenderView::section($name, $keep, $callbacks);
	}
}

if (!function_exists('stack')) {
	function stack($name)
	{
		return RenderView::stack($name);
	}
}