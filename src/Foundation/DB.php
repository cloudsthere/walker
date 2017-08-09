<?php

namespace Walker\Foundation;

class DB
{
	private static $pdo;

	public static function connect()
	{
		if (is_null(self::$pdo)) {
			$dsn = 'mysql:dbname=' . \Walker\config('db_name') . ';host=' . \Walker\config('db_host') . ';port' . \Walker\config('db_port');
			self::$pdo = new \PDO($dsn, \Walker\config('db_user'), \Walker\config('db_passwd'));

			// 抛出异常
			self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			self::$pdo->query('set names utf8');
		}
	}

	public static function query($sql, $fetch = false) 
	{
		try {
			self::connect();
			$result = self::$pdo->query($sql);
			return $fetch ? $result->fetchAll(\PDO::FETCH_ASSOC) : $result;
		} catch (\Exception $e) {
			\Walker\line($e->getMessage());
			throw $e;
		}
	}

	public static function select($sql) 
	{
		return self::query($sql, true);
	}
}