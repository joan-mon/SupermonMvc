<?php

namespace Supermon\Url;

class UriTest extends \PHPUnit_Framework_TestCase
{
    public function testCanInstanceUriClass()
    {
        $uri = new Uri('test', 'test', 'test');
        
        $this->assertInstanceOf('Supermon\Url\Uri', $uri);
    }
}
