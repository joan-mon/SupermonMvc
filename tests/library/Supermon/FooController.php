<?php


class FooController extends \Supermon\Controller
{
    public function barAction($var)
    {
        return 'test'.$var;
    }
}
