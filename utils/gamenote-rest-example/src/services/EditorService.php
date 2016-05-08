<?php

namespace src\services;

use \lib\model\Service;
use \src\models\EditorModel;

class EditorService extends Service
{
    public function __construct()
    {
        $this->model = new EditorModel();
    }
}