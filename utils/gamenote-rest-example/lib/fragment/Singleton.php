<?php

namespace lib\fragment;

trait Singleton
{
    /**
     * @var $_instance
     */
    private static $_instance = null;

    /**
     * getInstance
     *
     * @return object
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}