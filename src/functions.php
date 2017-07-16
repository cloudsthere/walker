<?php

function config($key)
{
	static $config;
	if (is_null($config)) {
		$config = include CONFIG_FILE;
	}

	return $config[$key];
}

function line($content) 
{
	echo $content . "\n";
}