<?php


namespace Supermon;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testCanInstaceApplication()
    {
        $this->assertInstanceOf( 'Supermon\Application', new Application() );
    }
}
