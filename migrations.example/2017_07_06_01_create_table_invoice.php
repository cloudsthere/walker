<?php

use Walker\Foundation\DB;

class CreateTableInvoice
{
	public function up()
	{
		$sql = 'create table invoice (
			id int(10) unsigned not null auto_increment,
			order_id int(10) unsigned not null,
			name varchar(255),
			primary key (id)
		) engine=InnoDB default charset=utf8';

		DB::query($sql);
	}

	public function down()
	{
		$sql = 'drop table invoice';
		DB::query($sql);
	}
}