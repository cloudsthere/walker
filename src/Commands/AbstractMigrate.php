<?php

namespace Walker\Commands;

class AbstractMigrate
{
	protected function instance($migration)
	{
		include config('migration_path') . '/' . $migration;
		$segments = array_slice(explode('_', explode('.', $migration)[0]), 3);
		$class = implode('', array_map('ucfirst', $segments));
		return new $class;
	}
}