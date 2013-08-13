<?php namespace Ronaldvaneede\Featureswitch;

class Featureswitch {

    /**
    * Create a new featureswitch instance.
    *
    * @param  Illuminate\Config\Repository  $config
    * @return void
    */
    public function __construct(\Illuminate\Config\Repository $configuration) {
        $this->configuration = $configuration;
    }

    public function check($feature) {
        if(self::hasFeatureSwitchConfiguration()) {
            return true;
        }
        return false;
    }

    private function getFeatureSwitchConfiguration() {
        $get = $this->configuration->get('featureswitch::features');
        return $get;
    }

    private function hasFeatureSwitchConfiguration() {
        $has = $this->configuration->has('featureswitch::features');
        return $has;
    }
}