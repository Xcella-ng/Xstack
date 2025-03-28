<?php

namespace System\Base;

use ReflectionMethod;
use ReflectionFunction;

final class Stack
{
	private static $instance;

	private array $stack;

	private function __construct()
	{
		$this->stack = Route::currentStack();

		if (!$this::$instance)
			$this::$instance = $this;
	}

	public static function instantiate()
	{
		return !self::$instance ? new self() : self::$instance;
	}

	public function push()
	{
		return !empty($this->stack) ? $this->accept($this->stack['stack-info']) : $this->reject();
	}

	private function accept(object $build)
	{
		$args = [];
		$route_action = $build->route->action;

		if (is_array($route_action)) {
			loadFile($route_action[0]);
			$controller = new $route_action[0];
		}

		$method = is_array($route_action) ? new ReflectionMethod($controller, $route_action[1]) : new ReflectionFunction($route_action);
		$args = Route::router()->getFuncArgs($build, $method);
		$build->route->current = true;
		Route::$routeMatched = true;

		if (!call_user_func_array(is_array($route_action) ? [$controller, $route_action[1]] : $route_action, $args))
			return self::$instance->reject();
	}

	private function reject()
	{
		if (!Route::$routeMatched) {
			if (!empty(Route::$acceptedRouteMethods)) {
				$route = '';
				$methods = '';

				foreach (Route::$acceptedRouteMethods as $key => $methods) {
					$route = $key;
					$methods = implode(', ', $methods);
				}
				dd("The given route: \"$route\" does not support the <strong>\"$_SERVER[REQUEST_METHOD]\"</strong> method.<br>Supported methods: <strong><em>$methods</em></strong>");
			}
			dd("Current URI does not match any routes.");
		}
	}
}
