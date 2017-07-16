<?php

namespace Walker\Commands;

class Hello
{
	public $name = 'hello';

	public $description = 'say hello';

	public function handle()
	{
		echo 'hello';
	}
}