<?php namespace Ronaldvaneede\Featureswitch;

use \Mockery;

class FeatureSwitchTest extends \PHPUnit_Framework_TestCase {

    //private $config;

    public function setUp() {
        $this->config = Mockery::mock('Illuminate\Config\Repository');
        $this->featureswitch = new Featureswitch($this->config);
    }

    public function tearDown() {
        Mockery::close();
    }

    public function testCheckShouldFailWhenThereIsNoConfiguration()
    {
        $this->config->shouldReceive('has')->once()->andReturn(false);
        $this->assertEquals(false, $this->featureswitch->check('feature'));
    }
}