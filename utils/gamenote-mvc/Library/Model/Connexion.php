<?php

namespace Library\Model;

class Connexion
{
	use \Library\Traits\Pattern\Singleton;

	private static $connexions;

	public static function getConnexion($connexionName)
	{
		if (array_key_exists($connexionName, self::$connexions))
		{
			return self::$connexions[$connexionName];
			
		}
		else
		{
			throw new \Exception("Connexion BDD not found");
		}
	}

	public static function getListConnexion()
	{
		return array_keys(self::$connexions);
	}

	public static function setConnexion($name, $objectPDO)
	{
		self::$connexions[$name] = $objectPDO;
	}

	private function __construct()
	{

	}

	public static function connect($host, $user, $password, $db, $charset)
	{
		$database = new \PDO("mysql:host=$host;dbname=$db", $user, $password);
		$database->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
		$database->exec("SET CHARACTER SET $charset");
		return $database;
	}
}