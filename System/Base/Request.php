<?php

namespace System\Base;

use stdClass;

class Request
{
	protected ?string $route_uri;

	protected mixed $original;

	protected ?string $current_uri = FULL_URI;

	protected ?string $request_uri = BASE_REQUEST_URI;

	protected function __construct(public string $method) {}

	protected function build(array $props)
	{
		foreach ($props as $key => $prop)
			$this->$key = $prop;
		return $this;
	}

	public function toArray()
	{
		return (array)$this->original;
	}
}
