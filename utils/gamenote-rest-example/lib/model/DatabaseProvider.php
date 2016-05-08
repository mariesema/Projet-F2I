<?php

namespace lib\model;
use \PDO as PDO;
use \Exception as Exception;

class DatabaseProvider
{
    use \lib\fragment\Singleton;

    private static $connexions;
    private static $databases = array(
        'default' => array(
            'host' => 'localhost',
            'user' => 'mogo',
            'pass' => 'madikrew',
            'name' => 'gamenote',
        ),
    );

    public static function getConnexion($connexionName)
    {
        if (array_key_exists($connexionName, self::$connexions)) {
            return self::$connexions[$connexionName];
        } else {
            throw new Exception("database connection not found");
        }
    }

    public static function setConnexion($name)
    {
        self::$connexions[$name] = self::connect($name);
    }

    public static function getListConnexion()
    {
        return array_keys(self::$connexions);
    }

    private function __construct() {}

    private static function connect($name)
    {
        $dbParams = self::$databases[$name];
        $database = new PDO('pgsql:host='.$dbParams['host'].';dbname='.$dbParams['name'], $dbParams['user'], $dbParams['pass']);
        $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // $database->exec("SET CHARACTER SET UTF-8");
        return $database;
    }
}