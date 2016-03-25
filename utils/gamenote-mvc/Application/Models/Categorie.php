<?php

namespace Application\Models;

class Categorie extends \Library\Model\Model
{
	protected $table = 'categorie';
	protected $primary = 'id';

	public function __construct($connexionName)
	{
		parent::__construct($connexionName);
	}
}