<?php

namespace Walker\Commands;

use Walker\Foundation\DB;

class MigrateRollback extends AbstractMigrate
{
	public $name = 'migrate:rollback';

	public $description = 'rollback the last migration';

	public function handle()
	{
		$migrations = $this->lastMigrations();
		foreach ($migrations as $migration) {
			$instance = $this->instance($migration);
			if (method_exists($instance, 'down')) {
				$instance->down();
			}
			DB::query('delete from migrations where migration="' . $migration . '"');
		}

	}

	private function lastMigrations()
	{
		$sql = 'select * from migrations where batch=(select batch from migrations order by batch desc limit 1)';
		$migrations = DB::select($sql);
		return array_column($migrations, 'migration');
	}
}