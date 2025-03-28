<?php

namespace System\Base;


class Request
{
	protected mixed $original;

	protected ?string $route_uri;

	protected ?string $current_uri = FULL_URI;

	protected ?string $request_uri = BASE_REQUEST_URI;

	// protected function __construct(public string $method) {}

	protected function build(array $props)
	{
		foreach ($props as $key => $prop)
			$this->$key = $prop;
		return $this;
	}

	public function key($key)
	{
		return $this->$key;
	}

	public function add($key, $value)
	{
		$this->$key = $value;
	}

	public function remove($key)
	{
		unset($this->$key);
	}

	public static function route()
	{
		return URL::route();
	}

	public static function toArray()
	{
		return (array)URL::request()->original;
	}

	public function validate(array $rules)
	{
		return Validator::init($this->toArray(), $rules)->validate();
	}
}