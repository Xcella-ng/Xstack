<?php

namespace System\Base;

use Exception;

class RenderView
{
	public string $viewFile;

	private static $instance;

	private static ?array $append, $section;

	public function __construct(public string $view)
	{
		$this::$instance = $this;
	}

	/**
	 * Allows setting template values while still returning the object instance
	 * $template->title($title)->text($text);
	 * @param mixed $key
	 * @param mixed $args
	 * @return static
	 */
	public function __call($key, $args)
	{
		$this->$key = $args[0];
		return $this;
	}

	/**
	 * Render template HTML
	 *
	 * @return bool|string
	 */
	public function __toString()
	{
		try {
			return $this->load();
		} catch (Exception $exception) {
			return $exception->getMessage();
		}
	}

	/**
	 * Load the given template
	 *
	 * @param string $file file name
	 * @return bool|string
	 */
	public function load()
	{
		ob_start();
		extract((array) $this);
		require $this->viewFile = getViewFile($this->view);
		return ob_get_clean();
	}

	/**
	 * Extend a parent template
	 *
	 * @param string $file name of template
	 */
	private function extends($file, $data)
	{
		if (!empty($data))
			foreach ($data as $key => $value)
				$this->$key($value);

		$this->view = constructViewFilePath($file);
		ob_end_clean(); // Ignore this child class and load the parent!
		ob_start();
		print $this->load();
	}

	public static function extend($view, ?array $data = NULL)
	{
		return self::$instance->extends($view, $data);
	}

	public static function section($name, $keep, $callbacks)
	{
		return self::$instance->start($name, $keep, $callbacks);
	}

	public static function endsection()
	{
		return self::$instance->end();
	}

	public static function stack($name)
	{
		return self::$instance->block($name);
	}

	private function block($name)
	{
		if (isset($this::$section[$name]))
			return $this::$section[$name];
	}

	private function start($name, $keep_parent = false, $filters = NULL)
	{
		ob_start(function ($buffer) use ($name, $keep_parent, $filters) {
			foreach ((array) $filters as $filter) {
				$buffer = $filter($buffer);
			}

			if (!isset($this::$section[$name])) {
				$this::$section[$name] = $buffer;
				$this::$append[$name] = $keep_parent;
			} elseif (isset($this::$append[$name]))
				$this::$section[$name] .= $buffer;
		});
	}

	private function end()
	{
		return ob_get_clean();
	}

	/**
	 * Convert special characters to HTML safe entities
	 *
	 * @param string $string to encode
	 * @return string
	 */
	public function e($string)
	{
		return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
	}

	/**
	 * Convert dangerous HTML entities into special characters
	 *
	 * @param string $s string to decode
	 * @return string
	 */
	public function d($string)
	{
		return htmlspecialchars_decode($string, ENT_QUOTES, 'UTF-8');
	}
}
