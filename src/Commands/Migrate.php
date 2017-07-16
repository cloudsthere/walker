<?php

namespace Walker\Commands;

use Walker\Foundation\DB;

class Migrate extends AbstractMigrate
{
	public $name = 'migrate';

	public $description = 'do migration';

	public function handle()
	{
		$this->createMigrationTableIfNotExists();

		list($batch, $migrated) = $this->migrated();

		$migrations = [];
		foreach (glob(config('migration_path') . '/*.php') as $migration) {
			$migrations[filectime($migration)] = pathinfo($migration, PATHINFO_BASENAME);
		}

		$migratings = array_diff($migrations, $migrated);
		ksort($migratings, SORT_NUMERIC);

		foreach ($migratings as $migrating) {
			$migration = $this->instance($migrating);
			$migration->up();
			DB::query('insert into migrations (migration,batch) values ("' . $migrating . '", "' . $batch . '")');
		}
	}

	private function createMigrationTableIfNotExists()
	{
		$sql = 'show tables like "migrations"';
		$migrations = DB::select($sql);

		if (empty($migrations)) {
			$sql = 'CREATE TABLE `migrations` (
			  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			  `batch` int(11) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';

			DB::query($sql);
		}
	}

	private function migrated()
	{
		$migrations = DB::select('select * from migrations order by id desc');
		$batch = empty($migrations) ? 0 : $migrations[0]['batch'];
		return [$batch + 1, array_column($migrations, 'migration')];
	}

}

