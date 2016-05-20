<?php

namespace src\services;

use \lib\model\Service;
use \src\models\RendezVousModel;

class RendezVousService extends Service
{
    public function __construct()
    {
        $this->model = new RendezVousModel();
    }
}