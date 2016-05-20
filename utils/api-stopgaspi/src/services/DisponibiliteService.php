<?php

namespace src\services;

use \lib\model\Service;
use \src\models\DisponibiliteModel;

class DisponibiliteService extends Service
{
    public function __construct()
    {
        $this->model = new DisponibiliteModel();
    }
}