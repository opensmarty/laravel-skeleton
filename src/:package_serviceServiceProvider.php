<?php

namespace :namespace;

use Illuminate\Support\ServiceProvider;

class :package_serviceServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/:package_name.php', ':package_name');

        if ($this->app->runningInConsole()) {
            $this->registerForConsole();
        }
    }

    /**
     * Register for console.
     *
     * @return void
     */
    protected function registerForConsole()
    {
        $this->publishes([
            __DIR__.'/../config/:package_name.php' => config_path(':package_name.php'),
        ], ':package_name');
    }

    /**
     * Create alias for the facade.
     *
     * @param  string  $facade
     * @param  string  $class
     * @return void
     */
    protected function aliasFacade($facade, $class)
    {
        if (class_exists('Illuminate\Foundation\AliasLoader')) {
            \Illuminate\Foundation\AliasLoader::getInstance()->alias($facade, $class);
        } else {
            class_alias($class, $facade);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [];
    }
}
