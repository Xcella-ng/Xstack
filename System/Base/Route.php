<?php

namespace System\Base;

use ArrayAccess;
use Closure;
use stdClass;

class Route extends Router
{
	public static function all()
	{
		return parent::routes();
	}

	public static function get(string $uri, array|Closure $action)
	{
		return Route::setRoute('get', $uri, $action);
	}

	public static function post(string $uri, array|Closure $action)
	{
		return Route::setRoute('post', $uri, $action);
	}

	public static function patch(string $uri, array|Closure $action)
	{
		return Route::setRoute('patch', $uri, $action);
	}

	public static function delete(string $uri, array|Closure $action)
	{
		return Route::setRoute('delete', $uri, $action);
	}

	private static function setRoute(string $method = 'get' | 'post' | 'patch' | 'delete', string $uri, array|Closure $action)
	{
		$route_info = new stdClass();

		$route_info->action = $action;
		$route_info->uri = $uri;
		$route_info->method = $method;
		$route_info->is_named = false;

		return new Router($route_info);
	}
}
