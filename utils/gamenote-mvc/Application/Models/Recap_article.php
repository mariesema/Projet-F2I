<?php

namespace Application\Models;

class Recap_article extends \Library\Model\Model
{
	protected $table = 'recap_article';
	protected $primary = 'id';

	public function __construct($connexionName)
	{
		parent::__construct($connexionName);
	}
}