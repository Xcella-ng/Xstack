<?php

namespace System\Stack;

use App\Models\Model;

trait BuildQuery
{
	private static $instance;

	private array $statementBuilder = [
		'SELECT' => "SELECT {columns} FROM {table}",
		'UPDATE' => "UPDATE {table} SET "
	];

	public static function where(array $query, string $operator = 'AND', string $comparator = '='): Model
	{
		self::$instance->buildQuery($query, 'SELECT', 'WHERE', $operator, $comparator);
		return self::$instance;
	}

	public static function orWhere(array $query)
	{
		return self::where($query, 'OR');
	}

	public static function whereGt(array $query)
	{
		return self::where($query, comparator: '>');
	}

	public static function orWhereGt(array $query)
	{
		return self::where($query, 'OR', '>');
	}

	public static function whereLt(array $query)
	{
		return self::where($query, comparator: '<');
	}

	public static function orWhereLt(array $query)
	{
		return self::where($query, 'OR', '<');
	}

	public static function whereNot(array $query)
	{
		return self::where($query, comparator: '!=');
	}
	public static function orWhereNot(array $query)
	{
		return self::where($query, 'OR', '!=');
	}

	private function buildQuery(array $queries, string $statement, string $type, string $operator, $comparator)
	{
		if (!$this->statement)
			$this->statement = $this->statementBuilder[$statement] . " $type";
		$queryCount = count($queries);

		foreach ($queries as $key => $value) {
			if (!str_ends_with($this->statement, $type) && !str_ends_with($this->statement, $operator))
				$this->statement .= " $operator ";
			else
				$this->statement .= " ";
			$this->statement .= "`$key` $comparator " . (is_numeric($value) || is_bool($value) ? $value : "'$value'") . ($key < ($queryCount - 1) ? " $operator" : NULL);

			if (!in_array($key, $this->columns))
				$this->columns[] =  $key;
		}
		$this->query = $this->statement;
		$this->buildOperators($comparator, $operator);
	}

	private function buildOperators($comparator, $operator)
	{
		if (!in_array($comparator, $this->operators['comparison']))
			$this->operators['comparison'][] = $comparator;

		if (!in_array($operator, $this->operators['logical']))
			$this->operators['logical'][] = $operator;
	}
}
