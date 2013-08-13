<?php namespace Ronaldvaneede\Featureswitch;

use Illuminate\Support\ServiceProvider;

class FeatureswitchServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ronaldvaneede/featureswitch');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['featureswitch'] = $this->app->share(function($app)
		{
			return new Featureswitch();
		});

		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Featureswitch', 'Ronaldvaneede\Featureswitch\Facades\Featureswitch');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('featureswitch');
	}

}