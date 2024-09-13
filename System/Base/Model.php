<?php

namespace System\Base;

use System\Stack\Grammar;

class Model
{
	protected ?string $table;

	public function __construct()
	{
		$called_class = get_called_class();
		$called_class_exploded = explode(DIRECTORY_SEPARATOR, useDirectorySeparator($called_class));
		$class_name = end($called_class_exploded);
		$underscored_name = getUnderscoredName($class_name);

		$grammar = new Grammar($underscored_name);
		// dd($underscored_name);
	}
}
