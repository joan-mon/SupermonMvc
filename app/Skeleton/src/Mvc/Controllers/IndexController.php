<?php

namespace Mvc\Controllers;

use \Supermon\View;

class IndexController extends \Supermon\Controller
{
    public function indexAction()
    {
        return View::render('index/index.phtml');
    }
    public function blogNameAction( $name )
    {
       View::set('name', $name);
       return View::render('index/blogName.phtml');
    }
}
