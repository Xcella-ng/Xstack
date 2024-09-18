<?php

namespace System\Base;

use Closure;

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
		$is_named = false;
		return new Router((object)compact('action', 'uri', 'method', 'is_named'));
	}
}
