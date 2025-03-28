<?php

namespace System\Base;

use Closure;

class Route extends Router
{
	public static function all()
	{
		return parent::routes();
	}

	public static function currentStack()
	{
		return parent::$stack;
	}

	public static function router()
	{
		return parent::$instance;
	}

	public static function any(string $uri, array|Closure $action)
	{
		return Route::setRoute('any', $uri, $action);
	}

	public static function get(string $uri, array|Closure $action)
	{
		return Route::setRoute('get', $uri, $action);
	}

	public static function post(string $uri, array|Closure $action)
	{
		return Route::setRoute('post', $uri, $action);
	}

	public static function put(string $uri, array|Closure $action)
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

	/**
	 * Summary of setRoute
	 * @param string $method 'any' | 'get' | 'post' | 'put' | 'patch' | 'delete'
	 * @param string $uri
	 * @param array|\Closure $action
	 * @return Router
	 */
	private static function setRoute(string $method = 'any' | 'get' | 'post' | 'put' | 'patch' | 'delete', string $uri, array|Closure $action)
	{
		$current = false;
		$is_named = false;
		$uri = trim($uri, '/');
		return new Router((object)compact('action', 'uri', 'method', 'current', 'is_named'));
	}
}
