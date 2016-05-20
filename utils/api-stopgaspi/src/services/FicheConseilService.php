<?php

namespace src\services;

use \lib\model\Service;
use \src\models\FicheConseilModel;

class FicheConseilService extends Service
{
    public function __construct()
    {
        $this->model = new FicheConseilModel();
    }
}