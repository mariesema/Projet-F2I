<?php

namespace Application\Config;

class Settings
{
	use \Library\Traits\Pattern\Singleton;

	private function __construct()
	{
		// define('WEB_ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
		// define('LINK_ROOT', str_replace('Public/index.php', '', 'http://localhost' . $_SERVER['SCRIPT_NAME']));
		define('APP_ROOT', str_replace('Public/index.php', 'Application/', $_SERVER['SCRIPT_FILENAME']));
		define('LIB_ROOT', str_replace('Public/index.php', 'Library/', $_SERVER['SCRIPT_FILENAME']));

		define('DB_HOST', 'localhost');
		define('DB_NAME', 'gamenote');
		define('DB_USER', 'root');
		define('DB_PASS', '');
		define('DB_CHARSET', 'utf8');
	}
}