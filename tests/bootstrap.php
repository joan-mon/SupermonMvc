<?php

define('APP_PATH' , realpath('../app'));

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../library/Supermon/src/Supermon/Autoloader.php';

$autoloader = new \Supermon\Autoloader(array(
    APP_PATH . '/../library/Supermon/src'
));

spl_autoload_register( array( $autoloader, 'autoload' ) );