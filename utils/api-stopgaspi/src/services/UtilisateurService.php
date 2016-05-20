<?php

namespace src\services;

use \lib\model\Service;
use \src\models\UtilisateurModel;

class UtilisateurService extends Service
{
    public function __construct()
    {
        $this->model = new UtilisateurModel();
    }
}