<?php

namespace lib\model;

use \PDO as PDO;

abstract class Model {

    protected $dbInstance;
    protected $table;
    protected $primary;

    public function __construct($connexionName = 'default')
    {
        $db  = DatabaseProvider::getInstance();
        $this->dbInstance = $db::getConnexion($connexionName);
    }

    public function findByPrimary($value)
    {
        $sql = $this->dbInstance->prepare("SELECT * FROM {$this->table} WHERE {$this->primary} = $value");
        $sql->execute();

        return $sql->fetch();
    }

    public function removeByPrimary($value)
    {
        $count = $this->dbInstance->exec("DELETE FROM {$this->table} WHERE {$this->primary} = $value");
        return ($count>0) ? true : false;
    }

    public function removeAll()
    {
        $count = $this->dbInstance->exec("DELETE FROM {$this->table}");
        return ($count>0) ? true : false;
    }

    public function findAll()
    {
        $sql = $this->dbInstance->prepare("SELECT * FROM {$this->table}");
        $sql->execute();

        return $sql->fetchAll();
    }
}