<?php

namespace Library\Router;

class Router
{
	use \Library\Traits\Pattern\Singleton;

	private function __construct()
	{

	}

	private static function getControllerName($name)
	{
		return '\Application\Controllers\\' . ucfirst(strtolower($name));
	}

	private static function getControllerPath($name)
	{
		return APP_ROOT . 'Controllers' . DIRECTORY_SEPARATOR . ucfirst(strtolower($name)) . '.php';
	}

	private static function getActionName($name)
	{
		return strtolower($name) . 'Action';
	}

	public static function dispatchPage($ressource)
	{
		$controller = self::getControllerName('error');
		$action = self::getActionName('error');

		if (file_exists(self::getControllerPath($ressource)) && class_exists(self::getControllerName($ressource)))
		{
			$controller = self::getControllerName($ressource);
		}

		$controller = new $controller;

		if (method_exists($controller, self::getActionName($_SERVER['REQUEST_METHOD'])))
		{
			$action = self::getActionName($_SERVER['REQUEST_METHOD']);

			$param = array();
			switch ($_SERVER['REQUEST_METHOD'])
			{
				case 'GET'		: 
				case 'DELETE'	:	$param = $_GET;
									unset($param['ressource']);
									break;
				case 'POST'		:
				case 'PUT'		:	parse_str(file_get_contents('php://input'), $param); break;
				case 'DELETE'	: 
			}
		}
		else
		{
			http_response_code(404);
			exit;
		}

		$controller->$action($param);
		// call_user_func_array(array($controller, 'getAction'), $param);
	}
}