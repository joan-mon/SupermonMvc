<?php

namespace Supermon\Url;

class Uri
{
    private $_uri;
    private $_controller;
    private $_action;
    
    public function __construct( $uri, $controller, $action )
    {
        $this->_uri = $uri;
        $this->_controller = $controller;
        $this->_action = $action;
    }
    
    public function where( $param, $regex )
    {
        
    }
}
