<?php

namespace System\Base;

use Exception;
use mysqli;
use System\Stack\BuildQuery;
use System\Stack\Grammar;

class Model
{
	use BuildQuery;

	protected $columns = [];

	protected ?mysqli $db;

	protected $query;

	protected $table;

	private int $count;

	private ?string $statement = NULL;

	private array $queryStack = [];

	protected array $operators = [
		'comparison' => [],
		'logical' => []
	];

	public function __construct()
	{
		$this->setTable();
		$this->db = DB::__instance()->connection;

		if (!self::$instance)
			self::$instance = $this;
	}

	public function getTable()
	{
		return $this->table;
	}

	public function get(array $columns = ['*'])
	{
		$result = [];
		$query = $this->performQuery($columns);
		$this->count = $query->num_rows;

		while ($row = $query->fetch_object())
			$result[] = $row;
		return $result;
	}

	public function count()
	{
		$this->get();
		return $this->count;
	}

	private function performQuery($columns)
	{
		$columsToString = implode(', ', $columns);
		$statement = preg_replace("/\{table\}/", "`$this->table`", preg_replace("/\{columns\}/", $columsToString, $this->statement));
		$this->statement = NULL;
		$this->query = $statement;

		try {
			return $this->db->query($statement);
		} catch (Exception $exception) {
			dd($exception->getMessage(), $exception->getTrace());
		}
	}

	private function setTable(?string $table = NULL)
	{
		if (!empty($table))
			$this->table = $table;
		else {
			if (empty($this->table)) {
				$called_class = get_called_class();
				$called_class_exploded = explode(DIRECTORY_SEPARATOR, useDirectorySeparator($called_class));
				$class_name = end($called_class_exploded);
				$underscored_name = getUnderscoredName($class_name);

				$grammar = new Grammar($underscored_name);
				$this->table = $grammar->getPlural();
			}
		}
	}
}
