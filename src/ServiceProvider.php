<?php

namespace Arrilot\SystemCheck;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'laravel-systemcheck'
        );

        $this->app->singleton('command.system.check', function ($app) {
            return new SystemCheckCommand($app['files'], $app['composer']);
        });

        $this->commands('command.system.check');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('laravel-systemcheck.php'),
        ]);
    }
}
