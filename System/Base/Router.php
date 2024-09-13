<?php

namespace System\Base;

use stdClass;
use Exception;
use ReflectionClass;
use ReflectionFunction;
use ReflectionMethod;
use ReflectionObject;

class Router extends Request
{
	protected static ?array $routes = [];
	protected static ?array $namedRoutes = [];

	public function __construct(public mixed $routeInfo)
	{
		parent::__construct($routeInfo->method);

		$build_request = $this->init($routeInfo);
		$this::$routes['original_uri'] = $this->current_uri;
		$this::$routes['requested_uri'] = $this->request_uri;
		$this::$routes['routes'][] = $routeInfo;

		if ($build_request) {
			$args = [];
			$route_action = $build_request->route->action;

			if (is_array($route_action)) {
				loadFile($route_action[0]);
				$controller = new $route_action[0];
			}

			$method = is_array($route_action) ? new ReflectionMethod($controller, $route_action[1]) : new ReflectionFunction($route_action);
			$args = $this->getFuncArgs($build_request, $method);
			call_user_func_array(is_array($route_action) ? [$controller, $route_action[1]] : $route_action, $args);
		}
	}

	private function getFuncArgs($build_request, $method)
	{
		$args = [];
		$method_parameter_count = $method->getNumberOfRequiredParameters();

		for ($i = 0; $i < $method_parameter_count; $i++) {
			$argument = $method->getParameters()[$i];
			$argument_name = $argument->getName();
			$argument_type = $argument->getType()->getName();

			$request_class_name = (new ReflectionClass(Request::class))->getName();
			$args[$argument_name] = $argument_type === $request_class_name ? $build_request->request : (!$argument->getType()->isBuiltin() ? new $argument_type : NULL);

			// TODO: Select Model by id
			// dd($build_request->request);
		}
		return $args;
	}

	private function init($routeInfo)
	{
		if (!empty($routeInfo->action)) {
			$total_matched = 0;
			$param_exp = '/\{(\w+)\}/';
			$this->route_uri = $routeInfo->uri;

			$_request_uri = trim($this->request_uri, '/');
			$_current_uri = trim($this->route_uri, '/');

			$_current_uri_exploded = explode('/', $_current_uri);
			$_request_uri_exploded = explode('/', $_request_uri);

			if (count($_current_uri_exploded) === count($_request_uri_exploded)) {
				for ($i = 0; $i < count($_current_uri_exploded); $i++)
					$total_matched += (preg_split('/\?|\#/', $_request_uri_exploded[$i])[0] === $_current_uri_exploded[$i] || preg_match_all($param_exp, $_current_uri_exploded[$i], $matches)) ? 1 : 0;

				if ($total_matched === count($_current_uri_exploded)) {
					$build_parameters = [];
					$parameters = new stdClass();
					$request_parameters = strtolower($routeInfo->method) === 'get' ? $_REQUEST : array_merge($_REQUEST, $_FILES);

					if (preg_match_all($param_exp, $this->route_uri, $matches)) {
						$keys = $matches[1];
						$exploded_uri = explode('/', $_request_uri);
						$values = array_splice($exploded_uri, 1);

						if (count($keys) === count($values)) {
							foreach ($keys as $key => $value)
								$parameters->$value = $values[$key];
							$routeInfo->parameters = $parameters;
						}
					}

					foreach ($request_parameters as $key => $value)
						$parameters->$key = $value;

					foreach ($parameters as $key => $value)
						$build_parameters[$key] = $value;

					$REQUEST = new parent($routeInfo->method);
					$REQUEST->original = $parameters;

					return (object)['route' => $routeInfo, 'request' => $REQUEST->build($build_parameters)];
				}
			}
		} else
			throw new Exception("The route action requires either an array or a closure.", 1);

		return false;
	}

	public static function routes(?string $name = NULL)
	{
		return $name ? (key_exists($name, Router::$namedRoutes) ? Router::$namedRoutes[$name] : die("Route <strong><em>'$name'</em></strong> is undefined.")) : Router::$routes;
	}

	public function name(string $name)
	{
		if (!empty($this::$routes['routes']))
			foreach ($this::$routes['routes'] as $route) {
				if ($route->uri === $this->route_uri) {
					$route->is_named = true;
					$route->name = $name;
					$this::$namedRoutes[$name] = $route;
				}
			}
	}
}
