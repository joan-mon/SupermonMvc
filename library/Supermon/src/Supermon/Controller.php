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


    public function __construct( Http\Request $request )
    {
        $this->_request = $request;
        $this->_response = new Http\Response();
        $this->init();
    }

    protected function init(){}
}
