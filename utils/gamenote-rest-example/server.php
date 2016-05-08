<?php

require_once('rest/RestServer.php');

require_once('lib/loader/Autoloader.php');
$autoloader = \lib\loader\Autoloader::getInstance();
$autoloader::setBasePath(__DIR__.DIRECTORY_SEPARATOR);

$service = null;
if (isset($_GET['service']) && !empty($_GET['service'])) {
    $service = ucwords(strtolower($_GET['service'])).'Service';
}

// enable database connection
$database = \lib\model\DatabaseProvider::getInstance();
$database::setConnexion('default');

$server = new RestServer($service);
$server->handle();