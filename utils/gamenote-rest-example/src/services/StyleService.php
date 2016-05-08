<?php

namespace src\services;

use \lib\model\Service;
use \src\models\StyleModel;

class StyleService extends Service
{
    public function __construct()
    {
        $this->model = new StyleModel();
    }
}