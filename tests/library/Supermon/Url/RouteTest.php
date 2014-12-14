<?php

namespace Supermon\Url;

class RouteTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp() {
        
        $this->assertInstanceOf('Supermon\Url\Uri', Route::get( 'test', 'test', 'test'));
        $this->assertInstanceOf('Supermon\Url\Uri', Route::post( 'test', 'test', 'test'));
        Route::get('test/{var}', 'testvar', 'testvar')
                    ->where('var', '[0-9]+');
        
        parent::setUp();
    }
    
    public function testRouteCanMatchSomeRequests()
    {

        $this->prepareServerParams('test');
        $this->assertInstanceOf('Supermon\Url\Uri', Route::match(new \Supermon\Http\Request() ) );
        
        $this->prepareServerParams('test', 'POST');
        $this->assertInstanceOf('Supermon\Url\Uri', Route::match(new \Supermon\Http\Request() ) ,'Post request must match');
        
        $this->prepareServerParams('notfound');
        $this->assertFalse( Route::match(new \Supermon\Http\Request() ), "'notfound' uri dont retrieve nothing" );
        
        $this->prepareServerParams('test/var');
        $this->assertFalse( Route::match(new \Supermon\Http\Request() ), "'test/var' uri must fail retrieve nothing" );
        
        $this->prepareServerParams('test/1234');
        $this->assertInstanceOf('Supermon\Url\Uri', $var_uri = Route::match(new \Supermon\Http\Request() ) );
        $this->assertEquals('testvar', $var_uri->getControllerName());
    }
    
    private function prepareServerParams($request_uri, $mehtod = 'GET')
    {
        $_SERVER['REQUEST_METHOD'] = $mehtod;
        $_SERVER['REQUEST_URI'] = $request_uri;
    }
}
