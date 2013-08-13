<?php namespace Ronaldvaneede\Featureswitch;

use \Mockery as mock;

class FeatureSwitchTest extends \PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->featureswitch = new Featureswitch();
    }

    public function tearDown() {

    }
    
    public function testShouldReturnTrue()
    {
        $this->assertTrue($this->featureswitch->check());
    }

}