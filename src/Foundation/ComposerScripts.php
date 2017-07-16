<?php

namespace Walker\Foundation;

use Composer\Script\Event;

class ComposerScripts
{
	public static function postInstall(Event $event)
	{
		copy($event->getcomposer()->getConfig()->get('vendor-dir') . '/' . $event->getComposer()->getPackage()->getName() . '/src/walker', realpath('./') . '/walker');
	}
}