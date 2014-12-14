<?php

namespace Mvc\Controllers;

class IndexController extends \Supermon\Controller
{
    public function indexAction()
    {
        return 'hola mundo!';
    }
    public function homeAction( $uri )
    {
        return $uri;
    }
}
