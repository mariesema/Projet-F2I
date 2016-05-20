<?php

namespace src\services;

use \lib\model\Service;
use \src\models\PrefectureModel;

class PrefectureService extends Service
{
    public function __construct()
    {
        $this->model = new PrefectureModel();
    }
}