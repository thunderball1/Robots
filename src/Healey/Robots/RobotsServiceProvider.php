<?php namespace Healey\Robots;

use Illuminate\Support\ServiceProvider;

class RobotsServiceProvider extends ServiceProvider {

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
        $this->package('healey/robots');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['robots'] = $this->app->share(function($app)
        {
            return new Robots();
        });

        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Robots', 'Healey\Robots\RobotsFacade');
        });
    }

}