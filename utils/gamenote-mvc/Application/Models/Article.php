<?php

namespace Application\Models;

class Article extends \Library\Model\Model
{
	protected $table = 'article';
	protected $primary = 'id';

	public function __construct($connexionName)
	{
		parent::__construct($connexionName);
	}
}