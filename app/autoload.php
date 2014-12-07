<?php


require_once '../library/Supermon/src/Supermon/Autoloader.php';

$autoloader = new \Supermon\Autoloader(array(
    APP_PATH . '/../library/Supermon/src'
));

spl_autoload_register(array($autoloader, 'autoload'));