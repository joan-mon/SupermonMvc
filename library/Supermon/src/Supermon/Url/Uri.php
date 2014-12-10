<?php

namespace Supermon\Url;

class Uri
{
    private $_uri;
    private $_controller;
    private $_action;
    private $_matches = [];
    private $_where = [];


    public function __construct( $uri, $controller, $action )
    {
        $this->_uri = trim( $uri, '/' );
        $this->_controller = $controller;
        $this->_action = $action;
    }
    
    public function where( $param, $regex )
    {
        $this->_where[$param] = $regex;
    }
    
    public function match( $request_uri )
    {
        
        list($uri,) = explode('?', $request_uri);
        
        $this->_uri = preg_replace_callback('/\{(.+)\}/U', array($this, 'replaceCallback') , $this->_uri);

        $res = preg_match( '/^'. $this->escapeSlash( $this->_uri ) . '$/', trim( $uri, '/' ), $this->_matches);
        
        return (bool)$res;
    }
    
    public function getMatches()
    {
        return $this->_matches;
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function getAction()
    {
        return $this->_action;
    }

    public function replaceCallback( $matched )
    {
        $param = $matched[1];
        $template = '(?P<%s>%s)';
        $regex = isset( $this->_where[$param] ) ? $this->_where[$param] : '[^/]+';        

        return sprintf( $template, $param, $regex);
    }
    
    private function escapeSlash($str)
    {
        return str_replace('/', '\/', $str);
    }
}
