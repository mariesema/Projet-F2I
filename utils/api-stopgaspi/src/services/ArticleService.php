<?php

namespace src\services;

use \lib\model\Service;
use \src\models\ArticleModel;

class ArticleService extends Service
{
    public function __construct()
    {
        $this->model = new ArticleModel();
    }
}