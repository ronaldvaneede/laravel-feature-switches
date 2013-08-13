<?php namespace Ronaldvaneede\Featureswitch\Facades;

use Illuminate\Support\Facades\Facade;

class Featureswitch extends Facade {
    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor() { return 'featureswitch'; }
}