<?php

namespace System\Base;

use Directory;

final class Dir extends Directory
{
	private static ?string $root = ROOT;

	public static function root(?string $path = NULL)
	{
		if (!empty($path))
			Dir::$root = $path;
		return Dir::$root;
	}
}
