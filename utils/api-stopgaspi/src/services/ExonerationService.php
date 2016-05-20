<?php

namespace src\services;

use \lib\model\Service;
use \src\models\ExonerationModel;

class ExonerationService extends Service
{
    public function __construct()
    {
        $this->model = new ExonerationModel();
    }
}