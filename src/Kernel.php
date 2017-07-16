<?php

namespace Walker;

use Walker\Commands\Hello;
use Walker\Commands\Migrate;
use Walker\Commands\MigrationRollback;

class Kernel
{
	public $commands = [
		Migrate::class,
		Hello::class,
		MigrationRollback::class,
	];

	/**
	 * 保存实例化后的命令
	 * @var array
	 */
	private $instances = [];

	public function __construct()
	{
		foreach ($this->commands as $class) {
			$command = new $class;
			$this->instances[$command->name] = $command;
		}
	}

	public function menu()
	{
		foreach ($this->instances as $command) {
			line($command->name . '     ' . $command->description);
		}
	}

	public function handle($command)
	{
		if (!array_key_exists($command, $this->instances)) {
			die("command not found\n");
		}
		
		$this->instances[$command]->handle();
	}
}