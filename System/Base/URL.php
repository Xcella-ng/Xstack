<?php

namespace System\Base;

class URL
{
	public static ?string $base = URI;

	private $routeStack;

	private static $instance;

	public function __construct()
	{
		$this::$instance = $this;
		$this->routeStack = Route::currentStack()['stack-info'];
	}

	public static function request()
	{
		self::returnInstance();
		return self::$instance->routeStack->request;
	}

	public static function route()
	{
		self::returnInstance();
		return self::$instance->routeStack->route;
	}

	private static function returnInstance()
	{
		if (!self::$instance)
			new self();
	}
}
