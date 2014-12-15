<?php

namespace Supermon;

class ViewTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        View::setBasePath(__DIR__ . '/testviews');
        parent::setUp();
    }
    public function testViewCanRenderSimpleTemplate()
    {
        $this->assertEquals('test', View::render('simpletemplate.phtml'));
    }
    public function testViewCanRenderTemplateExtendingLayout()
    {
        $this->assertEquals('begintestend', View::render('test.phtml'));
    }
    public function testViewCanRenderVar()
    {
        View::set('varname','varname');
        $this->assertEquals('varname', View::render('testvar.phtml'));
        $this->assertEquals('varname', View::render('getvar.phtml'));
        $this->assertEquals('string(7) "varname"', trim(View::render('dumpvar.phtml')));
    }
    public function testViewMultiInherit()
    {
        $this->assertEquals('12321', View::render('three.phtml'));
    }
    public function testViewPartial()
    {
         $this->assertEquals('beginpartialend', View::render('viewpartial.phtml'));
    }
}
