<?php

namespace src\services;

use \lib\model\Service;
use \src\models\ModTypeExonerationModel;

class ModTypeExonerationService extends Service
{
    public function __construct()
    {
        $this->model = new ModTypeExonerationModel();
    }
}