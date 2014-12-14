<?php

use Supermon\Url\Route;

Route::get('', 'Mvc\Controllers\IndexController', 'indexAction');
Route::get('/home/{uri}', 'Mvc\Controllers\IndexController', 'homeAction');
