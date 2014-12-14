<?php

namespace Supermon;

class Controller
{
    /**
     * @var Http\Request 
     */
    public $request;
    /**
     * @var Http\Response 
     */
    public $response;


    public function __construct( Http\Request &$request, Http\Response &$response )
    {
        $this->_request = $request;
        $this->_response = $response;
        $this->init();
    }

    protected function init(){}
}
