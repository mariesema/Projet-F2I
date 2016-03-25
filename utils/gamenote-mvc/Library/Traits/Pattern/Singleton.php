<?php

namespace Library\Traits\Pattern;

trait Singleton
{
	/**
	* $_instace of class
	* @var $_instance
	*/
	private static $_instance = NULL;

	/**
	* getInsance
	*
	* @return object
	*/
	public static function getInstance()
	{
		if (is_null(self::$_instance))
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}