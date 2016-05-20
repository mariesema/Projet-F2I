<?php

namespace src\services;

use \lib\model\Service;
use \src\models\VilleModel;

class VilleService extends Service
{
    public function __construct()
    {
        $this->model = new VilleModel();
    }
}