<?php namespace Ronaldvaneede\Featureswitch;

use Illuminate\Config\Repository;
use \Mockery;

class FeatureSwitchTest extends \PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->config = $this->getRepository();
        $this->featureswitch = new Featureswitch($this->config);
    }

    public function tearDown() {
        Mockery::close();
    }

    public function testCheckShouldFailWhenThereIsNoConfiguration()
    {
        $options = $this->getDummyOptions();
        $this->config->getLoader()->shouldReceive('load')->once()->with('production', "features", null)->andReturn($options);

        $this->assertEquals(true, $this->featureswitch->check('login'));
        $this->assertEquals(false, $this->featureswitch->check('facebook'));
    }

    private function getRepository()
    {
        return new Repository(Mockery::mock('Illuminate\Config\LoaderInterface'), 'production');
    }

    private function getDummyOptions()
    {
        return array(
            'login' => array('enabled' => 'on'),
            'facebook' => array('enabled' => 'off'),
            //'google+' => array('enabled' => '5%'),
            //'twitter' => array('enabled' => 'users', 'user_list' => 'ronald,jaap,piet')
        );
    }
}