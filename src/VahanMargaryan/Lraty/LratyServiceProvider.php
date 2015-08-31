<?php namespace VahanMargaryan\Lraty;

use Illuminate\Support\ServiceProvider;

class LratyServiceProvider extends ServiceProvider {

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
		$this->publishes([
			__DIR__ . '/../../../bower_components/raty/lib' => public_path('packages/lraty'),
		], 'public');
//		$this->package('vahanmargaryan/lraty');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['lraty'] = $this->app->share(function($app)
		  {
		    return new Lraty;
		  });
		$this->app->booting(function()
		{
		  $loader = \Illuminate\Foundation\AliasLoader::getInstance();
		  $loader->alias('Lraty', 'VahanMargaryan\Lraty\Facades\Lraty');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
