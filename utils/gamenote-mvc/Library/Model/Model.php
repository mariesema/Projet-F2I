<?php

namespace Library\Model;

abstract class Model
{
	private $_database;

	protected $table;

	protected $primary;

	public function __construct($connexionName)
	{
		$classConnexion = Connexion::getInstance();
		$this->_database = $classConnexion::getConnexion($connexionName);
	}

	public function findByPrimary($primary=0, $field='*')
	{
		$sql = $this->_database->prepare("SELECT $field FROM `{$this->table}` WHERE `{$this->primary}` =:primary");
		$sql->execute(array('primary'=>$primary));
		return $sql->fetchAll();
	}

	public function fetchAll($field='*', $where='1')
	{
		$sql = $this->_database->prepare("SELECT $field FROM `{$this->table}` WHERE $where");
		$sql->execute();
		return $sql->fetchAll();
	}

	/**
	* array(
	*		'mail' => 'valueMail',
	*		'nom' => 'valueNom',
	*		'prenom' => 'valuePrenom',
	*		'password' => 'valuePassword'
	*		)
	*/
	public function insert($data)
	{
		// `mail`, `nom`, `prenom`, `password`
		$listFields = "`" . implode("`,`", array_keys($data)) . "`";

		//:mail,:nom,:prenom,:password
		$listValues = ":" . implode(",:", array_keys($data));

		$sql = $this->_database->prepare("INSERT INTO `{$this->table}` ($listFields) VALUES ($listValues)");
		if ($sql->execute($data)===true)
		{
			return $this->_database->lastInsertId();
		}
		return false;
	}

	public function updateByPrimary($data)
	{
		// `mail`=:mail, `nom`=:nom, `prenom`=:prenom, `password`=:password
		$listFieldsValues = "";
		foreach ($data as $key => $value)
		{
			$listFieldsValues.= "`$key`=:$key,";
		}
		$listFieldsValues = substr($listFieldsValues, 0, -1);

		$sql = $this->_database->prepare("UPDATE `{$this->table}` SET $listFieldsValues WHERE `{$this->primary}`=:{$this->primary}");
		if ($sql->execute($data)===true && $sql->rowCount()===1)
		{
			return true;
		}
		return false;
	}

	public function deleteByPrimary($primary)
	{

		$sql = $this->_database->prepare("DELETE FROM `{$this->table}` WHERE `{$this->primary}`=:primary");
		if ($sql->execute(array("primary"=>$primary))===true && $sql->rowCount()===1)
		{
			return true;
		}
		return false;
	}

	public function joinByName()
	{

	}
}