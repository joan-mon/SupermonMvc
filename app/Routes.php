<?php

use Supermon\Url\Route;

Route::get('', 'Mvc\Controllers\IndexController', 'indexAction');
Route::get('/blog/{name}', 'Mvc\Controllers\IndexController', 'blogNameAction');
