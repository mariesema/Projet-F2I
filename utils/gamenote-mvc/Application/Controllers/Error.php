<?php

namespace Application\Controllers;

class Error extends \Library\Controller\Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAction($param)
	{
		var_dump("res: error, method GET", $param);
	}

	public function postAction($param)
	{
		var_dump("res: error, method POST", $param);
	}

	public function putAction($param)
	{
		var_dump("res: error, method PUT", $param);
	}

	public function deleteAction($param)
	{
		var_dump("res: error, method DELETE", $param);
	}
}