<?php


require_once __DIR__ . '/../library/Supermon/src/Supermon/Autoloader.php';

$autoloader = new \Supermon\Autoloader(array(
    APP_PATH . '/../library/Supermon/src',
    APP_PATH . '/Skeleton/src'
));

spl_autoload_register(array($autoloader, 'autoload'));

require_once  __DIR__ . '/Routes.php';


\Supermon\View::setBasePath(APP_PATH . '/Skeleton/src/Mvc/Views');