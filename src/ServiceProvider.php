<?php

namespace Arrilot\SystemCheck;

use Arrilot\SystemCheck\Console\SystemCheckCommand;
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
        $this->app->singleton('system.checks', function($app) {
            return new ChecksCollection($app);
        });

        $this->app->singleton('command.system.check', function ($app) {
            return new SystemCheckCommand($app->make('system.checks'));
        });

        $this->commands('command.system.check');
    }
}
