<?php

define('APP_PATH' , realpath('../app'));

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once APP_PATH . '/autoload.php';

$app = new \Supermon\Application();

$app->run();