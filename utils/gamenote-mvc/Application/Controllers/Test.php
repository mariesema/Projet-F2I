<?php

namespace Application\Controllers;

class Test extends \Library\Controller\Controller
{
	public function __construct()
	{
		parent::__construct();
		// var_dump("controller TEST");
	}

	public function indexAction()
	{
		// var_dump("Controller Index IndexAction");
	}
}