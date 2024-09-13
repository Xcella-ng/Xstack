<?php

namespace System\Stack;

final class Grammar
{
	private string $word;

	private static array $vowels = ['a', 'e', 'i', 'o', 'u'];

	private static array $plurals = [
		'y' => 'ies',
		'o' => 'oes',
		'us' => 'i',
		'is' => 'es',
		'on' => 'a',

	];

	public function __construct(string $word)
	{
		$this->word = $word;
		$this->getPlural();
	}

	public function getPlural()
	{
		$word = $this->word;
		$chars = str_split($word);
		$char_count = count($chars);
		dd($chars);
	}
}
