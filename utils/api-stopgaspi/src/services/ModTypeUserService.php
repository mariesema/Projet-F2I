<?php

namespace src\services;

use \lib\model\Service;
use \src\models\ModTypeUserModel;

class ModTypeUserService extends Service
{
    public function __construct()
    {
        $this->model = new ModTypeUserModel();
    }
}