<?php

namespace Application\Controllers;

class Index extends \Library\Controller\Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAction($param)
	{
		// var_dump("res: index, method GET", $param);
		$this->setResponseBody(array('ressource' => 'index',
									'method' 	 => 'get'));
	}

	public function postAction($param)
	{
		// var_dump("res: index, method POST", $param);
		$this->setResponseStatus(201); // 201 = created
		$this->setResponseBody(array('ressource' => 'index',
									'method' 	 => 'post'));
	}

	public function putAction($param)
	{
		// var_dump("res: index, method PUT", $param);
		$this->setResponseBody(array('ressource' => 'index',
									'method' 	 => 'put'), 'error_message');
	}

	public function deleteAction($param)
	{
		// var_dump("res: index, method DELETE", $param);
		$this->setResponseStatus(204);
		exit;
		// $this->setResponseBody(true);
	}
}