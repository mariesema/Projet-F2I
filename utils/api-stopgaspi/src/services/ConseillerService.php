<?php

namespace src\services;

use \lib\model\Service;
use \src\models\ConseillerModel;

class ConseillerService extends Service
{
    public function __construct()
    {
        $this->model = new ConseillerModel();
    }
}