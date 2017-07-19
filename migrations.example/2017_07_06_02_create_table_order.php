<?php

use Walker\Foundation\DB;

class CreateTableOrder
{
	public function up()
	{
		$sql = 'create table `order` (
			id int(10) unsigned not null auto_increment,
			price int(10) unsigned not null,
			name varchar(255),
			primary key (id)
		) engine=InnoDB default charset=utf8';

		DB::query($sql);
	}

	public function down()
	{
		$sql = 'drop table `order`';
		DB::query($sql);
	}
}