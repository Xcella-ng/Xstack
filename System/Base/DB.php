<?php

namespace System\Base;

use Exception;
use mysqli;

final class DB
{
	public ?mysqli $connection;

	private static $instance;

	private function __construct() {}

	public static function __instance()
	{
		if (!self::$instance)
			self::$instance = new self;
		return self::$instance->config();
	}

	private function config()
	{
		try {
			$env = strtoupper(config('APP_ENV'));
			$host = config("DB_HOST_$env") ?? config('DB_HOST');
			$user = config("DB_USER_$env") ?? config('DB_USER');
			$port = (int)(config("DB_PORT_$env") ?? config('DB_PORT'));
			$password = config("DB_PASSWORD_$env") ?? config('DB_PASSWORD');
			$database = config("DB_DATABASE_$env") ?? config('DB_DATABASE');

			self::$instance->connection = new mysqli($host, $user, $password, $database, $port);
		} catch (Exception $exception) {
			dd('<strong>Error: </strong>' . $exception->getMessage(), '<strong>in file: </strong>' . $exception->getFile(), '<strong>on line: </strong>' . $exception->getLine());
		}
		return self::$instance;
	}
}
