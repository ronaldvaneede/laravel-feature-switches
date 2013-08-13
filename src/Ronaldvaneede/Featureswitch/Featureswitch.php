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

    public function allow($feature) {
        $key = "app.features.".$feature;
        if($this->isConfigured($key)) {
            return $this->checkAllowed($key);
        }
        return false;
    }

    /**
     * @param $key
     * @return bool
     */
    private function checkAllowed($key)
    {
        $config = $this->getConfiguration($key);
        if ('on' === $config['enabled']) {
            return true;
        }
        return false;
    }

    private function getConfiguration($feature) {
        return $this->configuration->get($feature);
    }

    private function isConfigured($feature) {
        return $this->configuration->has($feature);
    }
}