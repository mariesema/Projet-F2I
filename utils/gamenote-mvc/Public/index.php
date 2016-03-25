<?php

require_once('../Library/Loader/Autoloader.php');
$autoloader = \Library\Loader\Autoloader::getInstance();
$autoloader::setBasePath(str_replace('Public', '', __DIR__));

\Application\Config\Settings::getInstance();

$database = \Library\Model\Connexion::getInstance();
$database::setConnexion('localhost', $database::connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_CHARSET));

$router = \Library\Router\Router::getInstance();
$router::dispatchPage($_GET['ressource']);