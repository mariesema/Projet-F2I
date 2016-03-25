<?php

namespace Library\Loader;
require_once(str_replace('Loader', 'Traits\Pattern\Singleton.php', __DIR__));

class Autoloader
{
	use \Library\Traits\Pattern\Singleton;

	private static $_basePath = NULL;

	private function __construct()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	/**
	* setter basePath
	*
	* @param String $value path project
	* @return void
	*/
	public static function setBasePath($value)
	{
		self::$_basePath = $value;
	}

	/**
	* autoload class
	*
	* @param String $className class Name
	* @return void
	*/
	protected function autoload($className)
	{
		if (is_null(self::$_basePath))
		{
			throw new \Exception("Base Path incorrect");
							
		}
		require_once(self::$_basePath . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php');
		// var_dump($className);
	}
}