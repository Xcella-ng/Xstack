<?php

namespace System\Base;

use Directory;

class Dir extends Directory
{
	public static ?string $root = ROOT;

	public static function root($path)
	{
		if (!empty($path))
			Dir::$root = $path;
		return Dir::$root;
	}
}
