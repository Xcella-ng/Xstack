<?php

namespace System\Base;

class Validator
{
	private ?object $errorBag;

	private function __construct() {}

	public static function init(array $data, array $rules)
	{
		$ValidatorObject = new Validator;
		return $ValidatorObject;
	}
}
