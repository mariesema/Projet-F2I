<?php

namespace lib\loader;
require_once(str_replace('loader', 'fragment' . DIRECTORY_SEPARATOR . 'Singleton.php' , __DIR__));

class Autoloader
{
    // Get Pattern Singleton
    use \lib\fragment\Singleton;

    private static $_basePath = NULL;

    private function __construct(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }


    /**
     * Setter basePath
     *
     * @param String $value  Path project
     * @return void
     */
    public static function setBasePath($value){
        self::$_basePath = $value;
    }


    /**
     * autoload class
     *
     * @param  String $className ClassName
     * @return void
     */
    protected function autoload($className)
    {
        // var_dump($className);
        if (is_null(self::$_basePath)) {
            throw new \Exception("basePath is null");
        }
        // var_dump(self::$_basePath . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php');
        require_once(self::$_basePath . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php');
    }
}