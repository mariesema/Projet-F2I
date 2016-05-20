<?php

namespace src\services;

use \lib\model\Service;
use \src\models\ConsommationModel;

class ConsommationService extends Service
{
    public function __construct()
    {
        $this->model = new ConsommationModel();
    }
}