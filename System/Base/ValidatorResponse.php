<?php

namespace System\Base;

class ValidatorResponse
{
	private static $instance;

	public function __construct(public Validator $validator) {}

	public function validate()
	{
		return $this->errors();
	}

	public function errors()
	{
		return $this->validator->validatorErrors();
	}

	public function failed()
	{
		return $this->validator->validatorFailed();
	}

	public function passed()
	{
		return $this->validator->validatorPassed();
	}
}
